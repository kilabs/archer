<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategoriproduk-info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
            'class'=>'form-horizontal','role'=>'form'
        ),
)); ?>

	<?php if (Yii::app()->user->hasFlash('ResetPasswordForm')): ?>
	 <div class="alert alert-info">
		<?php echo Yii::app()->user->getFlash('ResetPasswordForm'); ?>
	</div>	
	<?php endif; ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'col-sm-2 control-label')); ?>
             <div class="col-sm-5">
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div></div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'repassword',array('class'=>'col-sm-2 control-label')); ?>
             <div class="col-sm-5">
		<?php echo $form->passwordField($model,'repassword',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'repassword'); ?>
	</div></div>
        
	<div class="form-group">            
            <div class="col-sm-5 col-sm-offset-2 "> 
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Change Password' : 'Change Password', array('class'=>'btn btn-primary')); ?>
            </div>
	</div>


<?php $this->endWidget(); ?>

</div>
<?php
Yii::app()->clientScript->registerScript('capca-aasasd',"
	$('#capca img').css('float','left');
	$('#capca a').css('float','left');
	$('#capca a').css('margin-top','8px');
	$('#capca input').addClass('form-control');
	$('#capca input').css('float','left').css('clear','both');
");