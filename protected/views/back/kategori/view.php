<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kategori', 'url'=>array('index')),
	array('label'=>'Create Kategori', 'url'=>array('create')),
	array('label'=>'Update Kategori', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kategori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);

$this->adminTitle = 'View Kategori #'.$model->id;
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		array(
			'name'=>'image',
			'value'=>'<img src="'.LUpload::raw('Kategori',$model->image).'" />',
			'type'=>'raw',
		),
		array(
			'name'=>'status',
			'value'=>$model->getStatus(),
		),
		'urut',
		'slug',
	),
	   'htmlOptions' => array('class' => 'table table-hover'),  
)); ?>
