<?php

	/*
	| ---------------------------------------------------
	| Application Main Cofiguration File
	| ----------------------------------------------------------
	|
	| This files controls the directories and files to use with the autoloader
	| It also hold the aliases for class names and a few general configuration options
	|
	*/
	
	return array
	(
		/*
		| ------------------------------------------------------------------------------------
		| Directories with classes for the autoloader
		| ------------------------------------------------------------------------------------
		*/
		'directories'			=>	[ ] ,
		/*
		| ------------------------------------------------------------------------------------
		| Namespace directories with classes for the autoloader
		| ------------------------------------------------------------------------------------
		*/
		'namespaces'			=>
		[
			'models'				=>	ptc_path('models'),
			'controllers'			=>	ptc_path('controllers'),
			'observers'			=>	ptc_path('observers')
		] ,
		/*
		| ------------------------------------------------------------------------------------
		| Class files for the autoloader
		| ------------------------------------------------------------------------------------
		*/
		'files'				=>	
		[ 
			'_Loader'		=>	ptc_path('app') . '/_loader.php'
		] ,
		/*
		| ------------------------------------------------------------------------------------
		| Class aliases
		| ------------------------------------------------------------------------------------
		*/
		'aliases'				=>
		[
			// SYSTEM
			'App'				=>	'fluidphp\framework\App' ,
			'Cli'					=>	'fluidphp\framework\Cli' ,
			'Module'				=>	'fluidphp\framework\Module\Manager' ,
			'HandyMan'			=>	'phptoolcase\HandyMan' ,
			'Router'				=>	'phptoolcase\Router' ,
			'Form'				=>	'phptoolcase\Form' ,
			'Auth'				=>	'phptoolcase\Auth' ,
			'View'				=>	'phptoolcase\View' ,
			'DB'					=>	'phptoolcase\Db' ,
			'QueryBuilder'			=>	'phptoolcase\QueryBuilder' ,
			'Model'				=>	'phptoolcase\Model' ,
			'Debug'				=>	'phptoolcase\Debug' ,
			'Event'				=>	'phptoolcase\Event'
		] ,
		/*
		|--------------------------------------------------------------------------
		| Application URL
		|--------------------------------------------------------------------------
		*/
		'url' 					=>	$_ENV['APP_URL'] ,
		/*
		|--------------------------------------------------------------------------
		| Application Main Folder Path
		|--------------------------------------------------------------------------
		*/
		'env' 				=>	$_ENV['APP_ENV'] ,
		/*
		|--------------------------------------------------------------------------
		| Application Timezone
		|--------------------------------------------------------------------------
		*/
		'timezone' 			=>	'Asia/Bangkok' ,
		/*
		|--------------------------------------------------------------------------
		| Application Locale Configuration
		|--------------------------------------------------------------------------
		*/		
		'locale' 				=>	'en' ,
		/*
		| ------------------------------------------------------------------------------------
		| Check Router Configuration when building routes
		| ------------------------------------------------------------------------------------
		*/
		'check_router_config'	=>	(($_ENV['TEST_ENV']) ? true : false),
		/*
		| --------------------------------------------------------------------------------------
		| Test Environment parameter
		| --------------------------------------------------------------------------------------
		*/
		'test_env'				=>	$_ENV['TEST_ENV'],
	);