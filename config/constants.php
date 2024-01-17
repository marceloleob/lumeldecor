<?php

return [

	// DEVELOPER INFORMATION
	'DEVELOPER' => [
		'ID'    => 1,
		'NAME'  => 'Marcelo Leopold',
		'EMAIL' => 'marceloleob@gmail.com',
	],

	// COMPANY INFORMATION
	'COMPANY' => [
		'NAME'  => config('app.name'),
		'EMAIL' => 'contato@lumeldecor.com.br',
	],

	// PAGINATION
	'PAGINATION' => [
		'TOTAL' => 20,
	],

	// IMAGES
	'PICTURES' => [
		'SIZE_LIMIT'    => 3072000, // 3 MEGABYTES EM KB
		'SIZE_MESSAGE'  => '3 MB',
		'QUANTITY'      => 10,
		'MAX_HEIGHT'    => 810,
		'NOTAVAILABLE'  => 'images/no-available-370x278.png',
		'STORAGE'       => [
			'SMALLER'   => 'pictures/products/thumbnail',
			'REGULAR'   => 'pictures/products/regular',
			'BIGGER'    => 'pictures/products/bigger',
		],
	],

	// BUSINESS RULES
	'RULES' => [
		'STATUS' => [
			'INACTIVE' => 0,
			'ACTIVE'   => 1,
		],
		'FEATURED' => [
			'YES' => 1,
			'NO'  => 0,
		],
		'LAUNCH' => [
			'YES' => 1,
			'NO'  => 0,
		],
		'DONE' => [
			'YES' => 1,
			'NO'  => 0,
		],
		'SHOW' => [
			'YES' => 1,
			'NO'  => 0,
		],
		'NATIONAL' => [
			'YES' => 1,
			'NO'  => 0,
		],
		'STOCK' => [
			'CURRENT' => 1,
		],
	],

    // GOOGLE CONFIGS
    'GOOGLE_ANALYTICS_ID'    => 'UA-165379082-1',
    'CAPTCHA_SECRET_KEY'     => '',
    'CAPTCHA_WEBSITE_KEY'    => '',

];
