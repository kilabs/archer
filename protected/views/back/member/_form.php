<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form','enctype'=>'multipart/form-data'), 
)); ?>

	<div class="alert alert-info">
		Fields with <span class="required">*</span> are required.
		<?php echo $form->errorSummary($model); ?>
	</div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'username',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div></div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'email',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div></div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'password1',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->passwordField($model,'password1',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'password1'); ?>
	</div></div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'password2',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->passwordField($model,'password2',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div></div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'namaLengkap',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->textField($model,'namaLengkap',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'namaLengkap'); ?>
	</div></div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'nomorTelepon',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->textField($model,'nomorTelepon',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'nomorTelepon'); ?>
	</div></div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'bio',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->textArea($model,'bio',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'bio'); ?>
	</div></div>

	<div class="form-group">
        <?php echo $form->labelEx($model,'fotoFile',array('class'=>'col-sm-2 control-label')); ?> 
        <div class="col-sm-10">
            <div class="fileupload fileupload-new" data-provides="fileupload">
            	<?php if ($model->fotoFile): ?>
            		<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo LUpload::thumbs('Profil',$model->foto,'200x150'); ?>" alt="" /></div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            	<?php else: ?>
            		<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
            	<?php endif ?>
                <div>
                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><?php echo $form->fileField($model,'fotoFile'); ?>  </span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>
    </div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'facebook',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->textField($model,'facebook',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'facebook'); ?>
	</div></div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'twitter',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->textField($model,'twitter',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'twitter'); ?>
	</div></div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'website',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'website'); ?>
	</div></div>

	<div class="form-group ">            
            <div class="col-sm-10 col-sm-offset-2 "> 
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-danger')); ?>
            </div>
	</div>  

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/bootstrap-fileupload.min.css');

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/jasny/js/bootstrap-fileupload.js',  CClientScript::POS_END);
