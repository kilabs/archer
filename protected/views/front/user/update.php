<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'View Post', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Galery Post', 'url'=>array('galery', 'id'=>$model->id)),
);

?>
<div class="col-md-9 dashboard">
<h3 class="roboto">Update Banner</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>