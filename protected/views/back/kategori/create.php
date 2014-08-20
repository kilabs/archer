<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kategori', 'url'=>array('index')),
);

$this->adminTitle = 'Create Kategori';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>