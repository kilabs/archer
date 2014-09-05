<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php endif;?>

	<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
          <h2 class="roboto">Daftar</h2>
          <hr>
          <p>
				<?php echo CHtml::textField('email','',array('class'=>'form-control','placeholder'=>'Username')); ?>
				<?php if ($error): ?>
					<div class="errorMessage" id="RegisterForm_email_em_" style=""><?php echo $error ?>.</div>
				<?php endif ?>
	 </p>
  <p>
    <input class="block" type="submit" value="Send Confirmation Email">
  </p>

<?php $this->endWidget(); ?>
  </div>
    </div>
  </div>