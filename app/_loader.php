<?php

	class _Loader
	{
		public static function verifyAccount($page, &$data, $lang)
		{
			$data = new \StdClass();
			try
			{
				$app = \App::option( 'app' );
				$request = Requests::put($app[ 'url' ] . $app[ 'env' ] . '/user-auth-api/wrapper/verify/' . \Router::getValue('code') . '/');
				$data->verification_call_data_success = true;
				$data->verification_call_data = json_decode($request->body);
				ptc_log($data->verification_call_data, "call success");
			}
			catch (\Throwable $e)
			{
				$data->verification_call_data_success = false;
				$data->verification_call_data = $e;
				ptc_log($data->verification_call_data, "call error");
			}
		}
	
		public static function _init($options)
		{
			$options['xml_config_path'] = str_replace('${template}', $options['template'], $options['xml_config_path']);
			$options['language_files_path'] = str_replace('${template}', $options['template'], $options['language_files_path']);
			\helpers\Website\Manager::_load($options);
			static::_addListeners($options);
			static::_addRoutes();
			return $options;
		}
		
		protected static function _addRoutes()
		{
			\Router::group( '_loader', function( )
			{
				\Router::get( '/_logout/', function( )
				{
					ptc_session_set( 'user.is_loggedin' , false, true);
					ptc_session_set( 'user.data', null, true);
					$cookie_name = \App::option('user-auth-api.autologin_cookie_name');
					if ($code = \Auth::getCookie($cookie_name))
					{
						\helpers\UserAuthApi\models\Users_Autologin_Tokens::setExpired($code);
						\Auth::setCookie($cookie_name, 0, 1, '/');
					}
					\Router::redirect(\Router::getRoute('_tpl_login'), 302);
					
				})->map('_tpl_logout');
				
				\Router::notFound( 404 , function()
				{
					$ui_language = ($lang = ptc_session_get( 'ui_language' )) ? $lang : 'english';
					if (!\App::storage('website.current_lang'))
					{
						\helpers\Website\Manager::setLang($ui_language);
					}
					echo \helpers\Website\Manager::page('_tpl_404');
				} );
				
			} )->prefix(\App::option('app.env'));
		}
		
		protected static function _addListeners($options)
		{
			ptc_listen( 'app.start' , function( )
			{ 
				ptc_session( 'start' );
				if ( !ptc_session_get( 'ui_language' ) || ( \Auth::getCookie( 'ui_language' ) && 
						\Auth::getCookie( 'ui_language' ) != ptc_session_get( 'ui_language' ) ) )
				{ 
					if ( $cookie = \Auth::getCookie( 'ui_language' ) )
					{
						$preferred_lang = $cookie;
					}
					else
					{
						$preferred_lang = 'english';
						$path = ( strlen( \App::env( ) ) > 0 ) ? \App::env( ) : '/';
						\Auth::setCookie( 'ui_language' , $preferred_lang , '365 days' , $path );
					}
					ptc_session_set( 'ui_language' , $preferred_lang , true); 
				}
				ptc_session_set( 'ui_language' , 'english' , true);
				\helpers\Website\Manager::setLang( ptc_session_get( 'ui_language' ) );
				if ( $timezone = ptc_session_get( 'user.data.timezone' ) )
				{
					date_default_timezone_set( $timezone );
				}
			} , $options['listener_priority'] );
		
			Event::listen('website.resources', function($page, &$resources, $type, $blockID)
			{
				if ('_tpl_globals' !== $blockID){ return; }	// work only with the global block
				if ( 'js' === $type )
				{
					$app = \App::option( 'app' );
					$resources .= \helpers\Website\Manager::buildJsVars( array
					(
						'AW.Config'			=>	array
						(
							'url'						=>	\helpers\Website\Manager::getPath(),
							'env'						=>	$app[ 'env' ] ,
							'test_env'					=>	$app[ 'test_env' ] ,
							'revision'					=>	\App::option( 'revision.number' ),
							'lang'					=>	\helpers\Website\Manager::getLang()
						),
						'AW.Api.prefix'					=>	$app[ 'url' ] . $app[ 'env' ] . '/user-auth-api/wrapper',
						'AW.routes'	=>
						[
							'check-email'	=>			$app[ 'url' ] . $app[ 'env' ] . '/check-email/',
							'home'		=>			$app[ 'url' ] . $app[ 'env' ] . '/'
						],
						'AW.user_code'		=>			(($code = @\Router::getValue('code')) ? $code : '')
					));
				}
			}, 0);
		
			\Event::listen( 'website.load_routes_xml', function($controllerID, $xml)
			{
				if (file_exists(ptc_path('xml') . '/config/routes.xml'))
				{
					$xml = simplexml_load_file(ptc_path('xml') . '/config/routes.xml');
					foreach ($xml->controller as $controller)
					{
						if ($controllerID === (string)$controller->attributes()->id)
						{
							$routes = new \helpers\Website\Routes($controllerID, $xml);
							$routes->compile();
							break;
						}
					}
				}
			}, 0);
			
			\Event::listen('website.load_pages_xml', function($pageID, &$xml)	
			{
				if (file_exists(ptc_path('xml') . '/config/pages.xml'))
				{
					$xml2 = simplexml_load_file(ptc_path('xml') . '/config/pages.xml');
					$xml = \helpers\Website\Manager::mergePages($xml, $xml2);
				}
				$duplicates = [ ];
				foreach($xml->page as $page)
				{
					$sid = (string)$page->attributes()->id;
					if (array_key_exists($sid, $duplicates))
					{
						$duplicates[$sid] = $duplicates[$sid] + 1;
					}
					else{ $duplicates[$sid] = 1; }
				}
				if (!empty($duplicates))
				{
					foreach ($duplicates as $k => $v)
					{
						if ($v == 1){ continue; }
						for($i = 0; $i < sizeof($xml->page); $i++)
						{
							$controller = (string)$xml->page[$i]->attributes()->id;
							if ($controller == $k && (string)$xml->page[$i]->attributes( )->_is_tpl)
							{
								unset($xml->page[$i]);
								break;
							}
						}
					}	
				}
				$duplicates = [ ];
				foreach($xml->elements->element as $element)
				{
					$name = (string)$element->attributes()->name;
					if (array_key_exists($name, $duplicates))
					{
						$duplicates[$name] = $duplicates[$name] + 1;
					}
					else{ $duplicates[$name] = 1; }
				}
				if (!empty($duplicates))
				{
					foreach ($duplicates as $k => $v)
					{
						if ($v == 1){ continue; }
						for($i = 0; $i < sizeof($xml->elements->element); $i++)
						{
							$name = (string)$xml->elements->element[$i]->attributes()->name;
							if ($name == $k && (string)$xml->elements->element[$i]->attributes( )->_is_tpl)
							{
								unset($xml->elements->element[$i]);
								break;
							}
						}
					}	
				}
			}, 0);
			
			\Event::listen( 'website.load_translator_xml' , function($xml)			
			{
				$file_raw = ptc_path('xml') . '/lang/' . \helpers\Website\Manager::getLang('suffix');
				if (file_exists($file_raw . '.xml'))
				{
					$xml2 = simplexml_load_file($file_raw . '.xml');
					foreach($xml2->translation as $translation)
					{
						$sid = (string)$translation->attributes()->key;
						if ($xml->has($sid )){ $xml->remove($sid ); }
					}
					$xml->load($file_raw);   
				}
			}, 0);
			
			\Event::listen('website.load_resources_xml' , function(&$xml)			
			{
				if (file_exists(ptc_path('xml') . '/config/resources.xml'))
				{
					$xml2 = simplexml_load_file(ptc_path('xml') . '/config/resources.xml');
					$xml = \helpers\Website\Manager::mergeResources($xml, $xml2);
				}
				$duplicates = [ ];
				foreach($xml->block as $block)
				{
					$sid = (string)$block->attributes()->id;
					if (array_key_exists($sid, $duplicates))
					{
						$duplicates[$sid] = $duplicates[$sid] + 1;
					}
					else{ $duplicates[$sid] = 1; }
				}
				if (!empty($duplicates))
				{
					foreach ($duplicates as $k => $v)
					{
						if ($v == 1){ continue; }
						for($i = 0; $i < sizeof($xml->block); $i++)
						{
							$sid = (string)$xml->block[$i]->attributes()->id;
							if ($sid == $k && (string)$xml->block[$i]->attributes( )->_is_tpl)
							{
								unset($xml->block[$i]);
								break;
							}
						}
					}
				}
				$duplicates = [ ];
				foreach($xml->resources->file as $file)
				{
					$sid = (string)$file->attributes()->id;
					if (array_key_exists($sid, $duplicates))
					{
						$duplicates[$sid] = $duplicates[$sid] + 1;
					}
					else{ $duplicates[$sid] = 1; }
				}
				if (!empty($duplicates))
				{
					foreach ($duplicates as $k => $v)
					{
						if ($v == 1){ continue; }
						for($i = 0; $i < sizeof($xml->resources->file); $i++)
						{
							$sid = (string)$xml->resources->file[$i]->attributes()->id;
							if ($sid == $k && (string)$xml->resources->file[$i]->attributes( )->_is_tpl)
							{
								unset($xml->resources->file[$i]);
								break;
							}
						}
					}
				}
			}, 0);
			
			Event::listen('website.compiling_view', function($page, &$object, &$views)
			{
				$file = ptc_path('views')  . '/templates/' . \App::options('website.template') . '/_extras.php';
				if (file_exists($file)){ require_once($file); }
			}, 0);
			
			\Event::listen('website.load_languages_xml' , function(&$xml)			
			{
				if (file_exists(ptc_path('xml') . '/config/languages.xml'))
				{
					$xml2 = simplexml_load_file(ptc_path('xml') . '/config/languages.xml');
					$xml = \helpers\Website\Manager::mergeXML($xml, $xml2, '//lang');
					$duplicates = [ ];
					foreach ( $xml as $language )
					{
						$controller = (string)$language->attributes( )->controller;
						if (array_key_exists($controller, $duplicates))
						{
							$duplicates[$controller] = $duplicates[$controller] + 1;
						}
						else
						{
							$duplicates[$controller] = 1;
						}
					}
					if (!empty($duplicates))
					{
						foreach ($duplicates as $k => $v)
						{
							if ($v == 1){ continue; }
							for($i = 0; $i < sizeof($xml->lang); $i++)
							{
								$controller = (string)$xml->lang[$i]->attributes()->controller;
								if ($controller == $k && (string)$xml->lang[$i]->attributes( )->_is_tpl)
								{
									unset($xml->lang[$i]);
									break;
								}
							}
						}	
					}
				}
			}, 0);
		}
	}