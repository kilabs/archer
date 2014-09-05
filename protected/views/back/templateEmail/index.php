<?php
/* @var $this TemplateEmailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Template Emails',
);

$this->menu=array(
	array('label'=>'Create TemplateEmail', 'url'=>array('create')),
	array('label'=>'Manage TemplateEmail', 'url'=>array('admin')),
);
?>

<h1>Template Emails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
