<?php

	/*
	|--------------------------------------------------------------------------
	| Application Routes
	|--------------------------------------------------------------------------
	|
	| Use this file to register all of the routes for your application.
	|
	*/
	
	use WpOrg\Requests\Requests as Requests;
	
	Router::group( 'main' , function( )
	{		

	} )->prefix( \App::option( 'app.env' ) );