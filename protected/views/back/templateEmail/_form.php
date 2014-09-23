<?php
/* @var $this TemplateEmailController */
/* @var $model TemplateEmail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'template-email-form',
        'htmlOptions'=>array(
            'class'=>'form-horizontal','role'=>'form'
        ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="alert alert-info">
            Fields with <span class="required">*</span> are required.
            <?php echo $form->errorSummary($model); ?>
        </div>
    
	<div class="form-group">
		<?php echo $form->labelEx($model,'proses',array('class'=>'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
		<?php echo $form->textField($model,'proses',array('size'=>60,'maxlength'=>255,'class'=>'form-control','disabled'=>'disabled')); ?>
	</div>
                    <?php echo $form->error($model,'proses'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'indonesia',array('class'=>'col-sm-2 control-label')); ?>
             <div class="col-sm-10">
		<?php echo $form->textArea($model,'indonesia',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		</div>
                    <?php echo $form->error($model,'indonesia'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'english',array('class'=>'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
		<?php echo $form->textArea($model,'english',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                </div>
		<?php echo $form->error($model,'english'); ?>
	</div>

	<div class="form-group">            
            <div class="col-sm-10 col-sm-offset-2 ">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
                </div>
            </div>

<?php $this->endWidget(); ?>

</div><!-- form -->