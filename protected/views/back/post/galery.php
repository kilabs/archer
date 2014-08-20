<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Galery',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'View Post', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
);

$this->adminTitle = 'Galery Post #'.$model->id;
?>

<div class="row">
    <div class="col-lg-12">
         <div class="panel panel-success">
            <div class="panel-heading">
               List Galery
            </div>

            <div class="panel-body">
              
        			<p style="text-align:center">
        				<?php foreach ($model->galerys as $key => $value): ?>
							<a  class="gal" href="<?php echo LUpload::raw('PostGalery',$value->image); ?>" ><img src="<?php echo LUpload::thumbs('PostGalery',$value->image,'200x200'); ?>" alt="" /></a>
        				<?php endforeach ?>
		        	</p>
            </div>
        </div>

        <div class="panel panel-warning">
            <div class="panel-heading">
               Add new foto to this post
            </div>

            <div class="panel-body">
            	<div class="form">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'post-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
							'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form','enctype'=>'multipart/form-data'),
					)); ?>

						<div class="alert alert-info">
							Fields with <span class="required">*</span> are required.
							<?php echo $form->errorSummary($newGalery); ?>
						</div>
						<?php echo $form->hiddenField($newGalery,'idPost'); ?>
						 <div class="form-group">
					        <?php echo $form->labelEx($newGalery,'imageFile',array('class'=>'col-sm-2 control-label')); ?> 
					        <div class="col-sm-10">
					            <div class="fileupload fileupload-new" data-provides="fileupload">
					            	<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
					            	<div>
					                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><?php echo $form->fileField($newGalery,'imageFile'); ?>  </span>
					                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
					                </div>
					            </div>
					        </div>
					    </div>
					    <div class="form-group ">            
				            <div class="col-sm-10 col-sm-offset-2 "> 
						<?php echo CHtml::submitButton('Add', array('class'=>'btn btn-danger')); ?>
				            </div>
					 <?php $this->endWidget(); ?>
					
					</div> 
				</div>
            </div>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/bootstrap-fileupload.min.css');

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/jasny/js/bootstrap-fileupload.js',  CClientScript::POS_END);


Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('gal',
        "
       $('a.gal').fancybox({
		    'opacity': true,
		    'overlayShow': false,
		    'transitionIn': 'elastic',
		    'transitionOut': 'none'
		});

        ",
        CClientScript::POS_READY);

