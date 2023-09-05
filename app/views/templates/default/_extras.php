<?php
	# Extra Resources File
	if (is_null($object['_data']))
	{
		$object['_data'] = new \stdClass(); 
	}	
	$path = \helpers\Website\Manager::getPath();
	$object['_data']->_manual_resources =new \stdClass(); 
	$object['_data']->_manual_resources->icon = $path . '/templates/default/assets/img/favicon/favicon.ico';
	$object['_data']->_manual_resources->fonts_googleapis = 'https://fonts.googleapis.com';
	$object['_data']->_manual_resources->fonts_gstatic = 'https://fonts.gstatic.com';
	$object['_data']->_manual_resources->fonts_googleapis_2 = 'https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap';
	$object['_data']->_manual_resources->helpers_js = $path . '/templates/default/assets/vendor/js/helpers.js';
	$object['_data']->_manual_resources->config_js = $path . '/templates/default/assets/js/config.js';
	$object['_data']->_manual_resources->buttons_js = 'https://buttons.github.io/buttons.js';