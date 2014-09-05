<?php
/* @var $this TemplateEmailController */
/* @var $model TemplateEmail */

$this->breadcrumbs=array(
	'Template Emails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Template Email', 'url'=>array('admin')),
);
?>

<h1>Create TemplateEmail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>