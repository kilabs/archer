<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Create Member', 'url'=>array('create')),
	array('label'=>'Update Member', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Member', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Member', 'url'=>array('admin')),
);
?>

<h1>View Member #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
		'namaLengkap',
		'nomorTelepon',
		'bio',
		'facebook',
		'twitter',
		'website',
		array(
			'name'=>'image',
			'value'=>'<img src="'.LUpload::raw('Profil',$model->foto).'" />',
			'type'=>'raw',
		),
		

	),
	  'htmlOptions' => array('class' => 'table table-hover'), 
)); ?>
