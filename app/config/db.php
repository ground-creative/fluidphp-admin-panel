<?php

	/*
	| ---------------------------------------------------
	| Database Connections Cofiguration File
	| ----------------------------------------------------------
	|
	| This file should hold details for all your database connections
	| Refer to http://phptoolcase.com/ptc-db-guide.html for all available options
	|
	*/

	return
	[
		'develop'	=>
		[
			'default'   =>  
			[
				'driver'				=>	'mysql' , 
				'user'				=>	$_ENV['DB_USER'] ,
				'pass'				=>	$_ENV['DB_PASS'] ,
				'host'				=>	$_ENV['DB_HOST'] ,
				'db'					=>	$_ENV['DB_NAME'] ,
				'charset'				=>	'utf8' ,
				'query_builder'			=>	true ,
				'query_builder_class'	=>	'QueryBuilder'
			]
		] ,
		'prod'	=>
		[
			'default'   =>
			[
				'user'				=>	$_ENV['DB_USER'] ,
				'pass'				=>	$_ENV['DB_PASS'] ,
				'host'				=>	$_ENV['DB_HOST'] ,
				'db'					=>	$_ENV['DB_NAME'] ,
				'charset'				=>	'utf8' ,
				'query_builder'			=>	true ,
				'query_builder_class'	=>	'QueryBuilder'
			]
		]
	];