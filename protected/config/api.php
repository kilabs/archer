<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
       'components'=>array(
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName'=>false,
				'rules'=>array(
					'api'=>'site/index',
					'api/login'=>'site/login',
					'api/register'=>'site/register',

					'api/<_c>'=>'<_c>',
					'api/<_c>/<_a>'=>'<_c>/<_a>',
				),
			),
		),
       'import'=>array(
			'application.models.api.*',
		),
    )
);