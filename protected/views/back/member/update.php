<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Member', 'url'=>array('index')),
	array('label'=>'View Member', 'url'=>array('view', 'id'=>$model->id)),
);

$this->adminTitle = 'Detail Member';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>