<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Galery Post', 'url'=>array('galery', 'id'=>$model->id)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<div class="col-md-9 dashboard">
<h3 class="roboto">View Post #<?php echo $model->id; ?></h3>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'judul',
		'slug',
		'kategori.nama',
		array(
			'name'=>'Kontent',
			'value'=>$model->detail->kontent,
			'type'=>'raw',
		),
		array(
			'name'=>'foto',
			'value'=>'<img src="'.LUpload::thumbs("PostGalery",@$model->cover->image,"100x100").'" />',
			'type'=>'raw',
			'visible'=>((isset($model->cover) and $model->cover!=null))
		),
		array(
			'name'=>'status',
			'value'=>$model->getStatus(),
		),
		'tanggalBuat',
		'tanggalModif',
	),
	  'htmlOptions' => array('class' => 'table table-hover'), 
)); ?>
</div>