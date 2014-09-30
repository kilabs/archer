<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        // Put front-end settings there
        // (for example, url rules).
        'name'=>'Bengkelin',
        'theme'=>'front',
        'components'=>array(
        	'urlManager'=>array(
	        	'urlFormat'=>'path',
	        	'showScriptName'=>false,
				'rules'=>array(
                    'register'=>'site/register',
                    'login'=>'site/login',
                    'logout'=>'site/logout',

                    'site/page/<view:.*?>'=>'site/page',
                    'activate/<token:.*?>'=>'site/activate',
					'kategori/<kategori:.*?>/'=>'post/list', 
                    'search'=>'post/list', 
					'bengkel/<kategori:.*?>/<id:.*?>/<slug:.*?>'=>'post/detail', 
				),
			),
        ),
        'import'=>array(
            'application.models.front.*',
        ),
    )
);