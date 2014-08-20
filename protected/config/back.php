<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
       'theme'=>'admin',
       'components'=>array(
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName'=>false,
				'rules'=>array(
					'admin'=>'site/index',
					'admin/<_c>'=>'<_c>',
					'admin/<_c>/<_a>'=>'<_c>/<_a>',
				),
			),
		),
    )
);