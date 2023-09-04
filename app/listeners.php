<?php
	
	/*
	|--------------------------------------------------------------------------
	| Application Event Listeners
	|--------------------------------------------------------------------------
	*/
	
	// override tpl pages
	\Event::listen( 'website.compiling_view', function($pageID, &$object, &$views)	
	{
		
	}, 10);
	
	// override tpl page elements
	\Event::listen( 'website.compiling_view_element', function($elementID, &$data, &$path)	
	{
		
	}, 10);
	
	// override tpl resources
	Event::listen('website.compiling_resource_block', function($page , $blockID, &$items , $type)
	{

	});