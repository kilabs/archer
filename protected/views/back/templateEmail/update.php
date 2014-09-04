<?php
/* @var $this TemplateEmailController */
/* @var $model TemplateEmail */

$this->breadcrumbs=array(
	'Template Emails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'View Template Email', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Template Email', 'url'=>array('admin')),
);
?>

<h1>Update TemplateEmail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>