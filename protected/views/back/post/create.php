<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
);

$this->adminTitle = 'Create Post';
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>