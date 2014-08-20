<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        // Put front-end settings there
        // (for example, url rules).
        'theme'=>'front',
        'components'=>array(
        	'urlManager'=>array(
	        	'urlFormat'=>'path',
	        	'showScriptName'=>false,
				'rules'=>array(
                    'register'=>'site/register',
                    'login'=>'site/login',
                    'logout'=>'site/logout',
                    
					'kategori/<id:.*?>/<slug:.*?>'=>'post/kategori', 
					'bengkel/<id:.*?>/<slug:.*?>'=>'post/detail', 
				),
			),
        ),
        'import'=>array(
            'application.models.front.*',
        ),
    )
);