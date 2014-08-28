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

?>
<div class="col-md-9 dashboard">
<h3 class="roboto">Create Banner</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>