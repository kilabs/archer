<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'
);

$this->menu=array(
	array('label'=>'Create Kategori', 'url'=>array('create')),
);

$this->adminTitle = 'List Kategori';
?>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            	'id'=>'kategori-grid',
            	'dataProvider'=>$model->search(),
            	'filter'=>$model,
                 'itemsCssClass' => 'table table-striped table-hover',   
                    // text format change    
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
            		'nama',
                    array(
                        'filter'=>Kategori::listStatus(),
                        'name'=>'status',
                        'value'=>'$data->getStatus()',
                    ),
            		'urut',
            		'slug',
            		array(
            			'class'=>'CButtonColumn',
                         'buttons'=>array (
                            'update'=> array(
                                'label' => '<i class="icon-edit"></i>',
                                                'imageUrl' => false,
                            ),
                            'view'=>array(
                                'label' => '<i class="icon-search"></i>',
                                                'imageUrl' => false,
                            ),
                            'delete'=>array(
                                'label' => '<i class="icon-trash"></i>',
                                                'imageUrl' => false,
                            ),
                        ),
                         'htmlOptions' => array('style'=>'width:80px')
            		),
            	),
            )); ?>
     