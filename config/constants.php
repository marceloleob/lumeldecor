<?php

return [

    // DEVELOPER INFORMATION
    'DEVELOPER_ID'           => 1,
    'DEVELOPER_NAME'         => 'Marcelo Leopold Batista',
    'DEVELOPER_EMAIL'        => 'marceloleob@gmail.com',

    // COMPANY INFORMATION
    'COMPANY_NAME'           => config('app.name'),
    'COMPANY_EMAIL'          => 'contato@lumeldecor.com.br',
    'COMPANY_SUBJECT_TO'     => 'Você recebeu um contato do site!',
    'COMPANY_SUBJECT_FROM'   => config('app.name'),

    // PAGINATION
    'TOTAL_PAGE'             => 20,

    // BUSINESS RULES
    'STATUS_INACTIVE'        => 0,
    'STATUS_ACTIVE'          => 1,

    // IMAGES
    'PICTURES_SIZE'          => 3072000, // 3 MEGABYTES EM KB
    'PICTURES_PATH_MSG'      => '3 MB',
	'PICTURES_LIMIT'         => 30,
	'PICTURES_MAX_HEIGHT'    => 800,
    'PICTURES_NOTAVAILABLE'  => 'images/no-available-370x278.png',

	// PATHS
	'PICTURES_PATHS'         => [
		'REGULAR'            => 'pictures/products/regular',
		'THUMBNAIL'          => 'pictures/products/thumbnail',
		'BIGGER'             => 'pictures/products/bigger',
	],

    // GOOGLE CONFIGS
    'GOOGLE_ANALYTICS_ID'    => 'UA-165379082-1',
    'CAPTCHA_SECRET_KEY'     => '',
    'CAPTCHA_WEBSITE_KEY'    => '',

];
