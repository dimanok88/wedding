<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'Свадебный',

	'preload'=>array('log'),

    'language' => 'ru',
    'sourceLanguage' => 'ru_ru',
    'charset' => 'utf-8',
    'layout'=> 'column2',

    //'defaultController' => 'parser',

	'import'=>array(
		'application.models.*',
		'application.components.*',
        //'application.extensions.email.*',
	),

	'components'=>array(
        //'dateFormatter'=>array('class'=>'CDateFormatter', 'params'=>array('ru')),
		'user'=>array(
			'allowAutoLogin' => true,
            'loginUrl' => array('site/login'),
		),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),

        'email'=>array(
            'class'=>'application.extensions.email.Email',
            'delivery'=>'php', //Will use the php mailing function.
            //May also be set to 'debug' to instead dump the contents of the email into the view
        ),

        'authManager' => array(
            // Будем использовать свой менеджер авторизации
            'class' => 'PhpAuthManager',
            // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
            'defaultRoles' => array('guest'),
            'showErrors' => YII_DEBUG,
        ),

		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
				
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=wedding',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '123',
			'charset' => 'utf8',
            'queryCachingDuration'=>true,
            'autoConnect' => false,
            'schemaCachingDuration' => 3600,
		),
		
		'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
        
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
                array(
                    'class' => 'CWebLogRoute',
                    'showInFireBug' => true, // firefox & chrome
                ), 
			),
		),
	
	),

    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>false,
        ),
        'contedit'=>array(
            'layout'=> 'column2',
        ),
    ),

	'params' => array(
		'adminEmail' => 'dimanok88@gmail.com',

        'uploadDir' => '/resources/upload/',

        'imgThumbWidth' => '350',
        'imgThumbHeight' => '150',
        'imgMiniWidth' => '100',
        'imgMiniHeight' => '80',
        'imgWidth' => '480',
        'imgHeight' => '320',

        'countItemsByPage' => '50',
        'countNewsByPage' => '2',
        'countNewsForIndex' => '3',

        'cacheListTime' => '1',

        'shortName' => 'Свадебный',
	),

);

