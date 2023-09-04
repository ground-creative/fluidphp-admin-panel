<?php

	/*
	| ---------------------------------------------------
	| Wesite Helper Cofiguration File
	| ---------------------------------------------------
	*/

	return array
	(
		'_load'				=>	'_Loader::_init' , 
		
		'controllers'			=>	[ 'main' ] ,
		
		'xml_config_path'		=>	ptc_path( 'xml' ) . '/config/templates/${template}' ,
		
		'language_files_path'	=>	ptc_path( 'xml' ) . '/lang/templates/${template}' ,
		
		'views_path'			=>	ptc_path( 'views' ) ,
		
		'lang_param'			=>	'_lang' ,
		
		'resources_param'		=>	'_resources' ,
		
		'data_param'			=>	'_data' ,
		
		'elements_param'		=>	'_elements' ,
		
		'meta_tags_param'		=>	'_metatags' ,
		
		'router_param'			=>	'_router' ,
		
		'auto_include_js_lang'	=>	true ,
		
		'use_app_prototype_js'	=>	true ,
		
		'debug_category'		=>	'Website Helper' ,
		
		'listener_priority'		=>	0 ,
		
		'app_prototype_helpers'	=>	'', // add more libraries separated by "|"
		
		'template'			=>	'default'	// extra param
	);