<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => '\\OAuth\\Common\\Storage\\Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Google' => [
			'client_id'     => env('GOOGLE_CLIENT_ID'),
			'client_secret' => env('GOOGLE_CLIENT_SECRET'),
			'scope'         => ['userinfo_email', 'userinfo_profile']
		],

		'Twitter' => [
			'client_id'     => env('TWITTER_CLIENT_ID'),
			'client_secret' => env('TWITTER_CLIENT_SECRET')
		],

	]

];