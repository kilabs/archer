<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post', 'url'=>array('create')),
);


$this->adminTitle = 'List Post';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'post-grid',
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
		'judul',
		array(
			'name'=>'idKategori',
			'filter'=>CHtml::listData(Kategori::model()->findAll(),'id','nama'),
      'value'=>'$data->kategori->nama',
		),
		array(
			'name'=>'foto',
      'type'=>'raw',
      'value'=>'\'<img src="\'.LUpload::thumbs("Post",$data->foto,"100x100").\'" />\' ',
		),
		 array(
            'filter'=>Post::listStatus(),
            'name'=>'status',
            'value'=>'$data->getStatus()',
        ),
    array(
    			'class'=>'CButtonColumn',
          'template'=>'{view}{update}{galery}{delete}',
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
                    'galery'=>array(
                      'label' => '<i class="icon-film"></i>',
                                        'imageUrl' => false,
                      'url'=>'Yii::app()->createUrl("post/galery", array("id"=>$data->id))',
                    ),
                ),
                 'htmlOptions' => array('style'=>'width:100px')
    		),
	),
)); ?>
