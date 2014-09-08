<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">

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

	<?php if (Yii::app()->user->hasFlash('ResetPassword')): ?>
	 <div class="alert alert-info">
		<?php echo Yii::app()->user->getFlash('ResetPassword'); ?>
	</div>	
	<?php endif; ?>

        <h2>Reset Password</h2>
        <hr class="colorgraph">
        <div class="alert alert-info">
            Reset password link will send to your mail
            <?php echo $form->errorSummary(array($model)); ?>
        </div>  
        
        <div class="form-group">               
          <div class="col-sm-12">
              <?php echo $form->textField($model,'email',array('size'=>256,'maxlength'=>256, 'class'=>'form-control', 'placeholder'=>"Email Account")); ?>
              <?php echo $form->error($model,'email'); ?>
          </div>                
          <div class="col-sm-12">
              <?php if(CCaptcha::checkRequirements()): ?>
		<div class="col-sm-12 text-center" id="capca">
                    <?php $this->widget('CCaptcha'); ?>
                </div>     
		<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control', 'placeholder'=>"Captcha Verifycode")); ?>
		
		<?php echo $form->error($model,'verifyCode'); ?>
              <?php endif; ?>
          </div>   
        </div> 
 

        <div class="form-group">                               
            <div class="col-sm-12 text-center"> 
                <?php echo CHtml::submitButton('Send Email', array('class'=>'btn btn-primary col-sm-12')); ?>
            </div>                            
        </div>     

<?php $this->endWidget(); ?>
 </div>
    </div>
  </div>  
<?php
Yii::app()->clientScript->registerScript('capca-aasasd',"
	$('#capca img').css('float','left');
	$('#capca a').css('float','right');
	$('#capca a').css('margin-top','15px');
	$('#capca input').addClass('form-control');
	$('#capca input').css('float','left').css('clear','both');
");