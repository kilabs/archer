<?php
/* @var $this TemplateEmailController */
/* @var $model TemplateEmail */

$this->breadcrumbs=array(
	'Template Emails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Update TemplateEmail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage TemplateEmail', 'url'=>array('admin')),
);
?>
<div class="panel panel-default">
    <div class="panel-heading">
<h1>View TemplateEmail #<?php echo $model->id; ?></h1>
</div>
<?php @$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'proses',
		array(
                    'name'=>'indonesia',
                    'value'=>Yii::app()->formatter->formatNtext($model->indonesia),
                    'type'=>'raw',
                ),
		array(
                    'name'=>'english',
                    'value'=>Yii::app()->formatter->formatNtext($model->english),
                    'type'=>'raw',
                ),
	),
     'htmlOptions' => array('class' => 'table table-hover'),
)); ?>
</div>