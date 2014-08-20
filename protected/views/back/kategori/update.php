<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kategori', 'url'=>array('index')),
	array('label'=>'Create Kategori', 'url'=>array('create')),
	array('label'=>'View Kategori', 'url'=>array('view', 'id'=>$model->id)),
);

$this->adminTitle = 'Update Kategori';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>