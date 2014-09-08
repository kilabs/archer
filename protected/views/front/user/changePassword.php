<div class="col-md-9 dashboard">
<h3 class="roboto">Ganti Password</h3>

<div class="form">

<?php if(Yii::app()->user->hasFlash('konfirmasi')): ?>

        <div class="alert alert-success">
            <?php echo Yii::app()->user->getFlash('konfirmasi'); ?>
        </div>

<?php else: ?>    


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-dashboard', 'role'=>'form','enctype'=>'multipart/form-data'),
)); ?>

	<div class="alert alert-info">
		Fields with <span class="required">*</span> are required.
		<?php echo $form->errorSummary($model); ?>
	</div>

	<div class="row form-dashboard-row">            
	    <div class="col-sm-3 col-xs-5">
	      <p class="form-dashboard-label">
	        <?php echo $form->labelEx($model,'oldPassword',array('class'=>'col-sm-2 control-label')); ?>     
	      </p>       
	    </div>
	    <div class="col-sm-6 col-xs-7">
				<?php echo $form->passwordField($model,'oldPassword',array('size'=>60,'maxlength'=>150,'class'=>'form-control form-dashboard-input')); ?>
				<?php echo $form->error($model,'oldPassword'); ?>
			</div>
	</div>

	<div class="row form-dashboard-row">            
	    <div class="col-sm-3 col-xs-5">
	      <p class="form-dashboard-label">
	        <?php echo $form->labelEx($model,'newPassword',array('class'=>'col-sm-2 control-label')); ?>     
	      </p>       
	    </div>
	    <div class="col-sm-6 col-xs-7">
				<?php echo $form->passwordField($model,'newPassword',array('size'=>60,'maxlength'=>150,'class'=>'form-control form-dashboard-input')); ?>
				<?php echo $form->error($model,'newPassword'); ?>
			</div>
	</div>

	<div class="row form-dashboard-row">            
	    <div class="col-sm-3 col-xs-5">
	      <p class="form-dashboard-label">
	        <?php echo $form->labelEx($model,'newPassword2',array('class'=>'col-sm-2 control-label')); ?>     
	      </p>       
	    </div>
	    <div class="col-sm-6 col-xs-7">
				<?php echo $form->passwordField($model,'newPassword2',array('size'=>60,'maxlength'=>150,'class'=>'form-control form-dashboard-input')); ?>
				<?php echo $form->error($model,'newPassword2'); ?>
			</div>
	</div>

	<div class="row form-dashboard-row">           
	    <div class="col-sm-6 col-xs-7 col-sm-offset-3 col-xs-offset-5"> 
	      <?php echo CHtml::submitButton('Ganti Password', array('class'=>'btn btn-danger')); ?>
	    </div>
	</div> 
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<?php endif; ?>