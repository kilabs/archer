<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post', 'url'=>array('create')),
);

?>


<div class="col-md-9 dashboard">

<h3 class="roboto">Daftar Layanan Anda</h3>

<a href="<?php echo Yii::app()->createUrl('/user/create'); ?>" class="btn btn-primary">Buat Layanan baru</a></li>


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
      'value'=>'@$data->kategori->nama',
		),
		array(
			'name'=>'foto',
      'type'=>'raw',
      'value'=>'\'<img src="\'.LUpload::thumbs("PostGalery",@$data->cover->image,"100x100").\'" />\' ',
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
                    'galery'=>array(
                      'label' => 'Galery',
                                        'imageUrl' => false,
                      'url'=>'Yii::app()->createUrl("/user/galery", array("id"=>$data->id))',
                    ),
                ),
             //    'htmlOptions' => array('style'=>'width:100px')
    		),
	),
)); ?>
</div>