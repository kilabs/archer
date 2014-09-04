<?php
/* @var $this TemplateEmailController */
/* @var $model TemplateEmail */

$this->breadcrumbs=array(
	'Template Emails'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'Create Template Email', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#template-email-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Template Emails</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'template-email-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
        'itemsCssClass' => 'table table-striped table-hover',
        'pagerCssClass'=>'text-center',    
        'pager'=>array(    
            'header'=>'',
            'prevPageLabel'=>'<',
            'nextPageLabel'=>'>',
                'selectedPageCssClass' => 'active',         
                'hiddenPageCssClass' => '',                        
                'htmlOptions'=>array(
                    'class'=>'pagination',
                ),                  
            ),
	'columns'=>array(
		'id',
		'proses',
		array(
                   'name'=>'indonesia',
                    'value'=>'Yii::app()->formatter->formatNtext($data->indonesia)',
                    'filter'=>false,
                    'type'=>'raw',
                ),
                array(
                   'name'=>'english',
                    'filter'=>false,
                    'value'=>'Yii::app()->formatter->formatNtext($data->english)',
                     'type'=>'raw',
                ),
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{update}'
		),
	),
)); ?>
