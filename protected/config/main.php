<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.php-mailgun.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'formatter'=>array(
			'class'=>'CFormatter',
		),
		'image'=>array(
			'class'=>'application.extensions.image.CImageComponent',
			// GD or ImageMagick
			'driver'=>'GD',
			// ImageMagick setup path
			//'params'=>array('directory'=>'/opt/local/bin'),
		),   
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
			),
		),
		
		'db'=>CMap::mergeArray(
		    require(dirname(__FILE__).'/db.php'),
		    array(
		        'schemaCachingDuration'=>3600,
		    )
		),
		'cache'=>array(
		    'class' => 'CFileCache',
		),

		'mailgun' => array(
            'class' => 'ext.php-mailgun.MailgunYii',
            'domain' => 'sandbox7240182016c14f3ea5303842674ec176.mailgun.org',
            'key' => 'key-2a4af88897911ab2110b4200ec6420b8',
       //     'tags' => array('yii'), // You may also specify some Mailgun parameters
            'enableTracking' => false,
        ),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
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
                    'class'=>'CFileLogRoute',
                    'levels'=>'info',
                    'categories'=>'SendingEmail',
                    'logFile'=>'EmailLog.log'
                ),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	'behaviors'=>array(
	    'runEnd'=>array(
	        'class'=>'application.components.WebApplicationEndBehavior',
	    ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php')
);