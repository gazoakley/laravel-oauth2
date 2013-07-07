<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Authentication Driver
	|--------------------------------------------------------------------------
	|
	| This option controls the authentication driver that will be utilized.
	| This drivers manages the retrieval and authentication of the users
	| attempting to get access to protected areas of your application.
	|
	| Supported: "database", "eloquent"
	|
	*/

	'driver' => 'eloquent',

	/*
	|--------------------------------------------------------------------------
	| Authentication Model
	|--------------------------------------------------------------------------
	|
	| When using the "Eloquent" authentication driver, we need to know which
	| Eloquent model should be used to retrieve your users. Of course, it
	| is often just the "User" model but you may use whatever you like.
	|
	*/

	'model' => 'User',

	/*
	|--------------------------------------------------------------------------
	| Authentication Table
	|--------------------------------------------------------------------------
	|
	| When using the "Database" authentication driver, we need to know which
	| table should be used to retrieve your users. We have chosen a basic
	| default value but you may easily change it to any table you like.
	|
	*/

	'table' => 'users',

	/*
	|--------------------------------------------------------------------------
	| Password Reminder Settings
	|--------------------------------------------------------------------------
	|
	| Here you may set the settings for password reminders, including a view
	| that should be used as your password reminder e-mail. You will also
	| be able to set the name of the table that holds the reset tokens.
	|
	*/

	'reminder' => array(

		'email' => 'emails.auth.reminder', 'table' => 'password_reminders',

	),



	/*
		OAuth Providers
	*/

	'oauth_providers' => array(
		'twitter' => array(
			'client_id' => 'EnoBgzm1clHnk04AfsT7w',
			'secret' => 'He0KVBfkhuEXoOXJMuP7jepYGjzNsfo3DUBN2dj7m4I',
		),
		'vkontakte' => array(
			'client_id' => '3733726',
			'secret' => 'SvX3rV8gKlOOjwXrPqgy',
		),
		'facebook' => array(
			'client_id' => '173213859523164',
			'secret' => '8ae9c75d3142e5621778f289b98d09e9',
		),
		'google' => array (
			'client_id' => '137364554504.apps.googleusercontent.com',
			'secret' => 'F-jSQugnAXlGxWh3iBRk72vp',
		),


	)

);