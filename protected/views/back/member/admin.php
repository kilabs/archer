<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List Member', 'url'=>array('index')),
	array('label'=>'Create Member', 'url'=>array('create')),
);

$this->adminTitle = 'List Member';
?>

 <?php $this->widget('zii.widgets.grid.CGridView', array(
            	'id'=>'kategori-grid',
            	'dataProvider'=>$model->search(),
            	'filter'=>$model,
                 'itemsCssClass' => 'table table-striped table-hover',   
                    // text format change    
                       'pagerCssClass'=>'text-center',    
                       'pager'=>array(    
                           'header'=>'',
                           'prevPageLabel'=>'<',
                           'nextPageLabel'=>'>',
                               'selectedPageCssClass' => 'active',         
                               'hiddenPageCssClass' => '',                        
                               'htmlOptions'=>array(
                                   'class'=>'pagination',
                               ),                  
                           ),  
	'columns'=>array(
		'id',
		'username',
		'email',
		'nomorTelepon',
		/*
		'twitter',
		'website',
		'foto',
		'namaLengkap',
		'nomorTelepon',
		'bio',
		*/
		array(
			'class'=>'CButtonColumn',
			 'template'=>'{update}{delete}',
	         'buttons'=>array (
	            'update'=> array(
	                'label' => '<i class="icon-edit"></i>',
	                                'imageUrl' => false,
	            ),
	            'view'=>array(
	                'label' => '<i class="icon-search"></i>',
	                                'imageUrl' => false,
	            ),
	            'delete'=>array(
	                'label' => '<i class="icon-trash"></i>',
	                                'imageUrl' => false,
	            ),
	        ),
	         'htmlOptions' => array('style'=>'width:80px')
		),
	),
)); ?>
