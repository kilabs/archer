<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
    	'name'=>'Bengkelin Admin',
       'theme'=>'admin',
       'components'=>array(
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName'=>false,
				'rules'=>array(
					'albarka2014'=>'site/index',
					'albarka2014/<_c>'=>'<_c>',
					'albarka2014/<_c>/<_a>'=>'<_c>/<_a>',
				),
			),
		),
       'import'=>array(
			'application.models.back.*',
		),
    )
);