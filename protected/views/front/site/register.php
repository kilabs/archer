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
				<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
				<?php echo $form->error($model,'username'); ?>
	 </p>
          <p>
		<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'email'); ?>
	 </p>
          <p>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
		<?php echo $form->error($model,'password'); ?>
	 </p>
          <p>
		<?php echo $form->passwordField($model,'passwordKonfirm',array('class'=>'form-control','placeholder'=>'Konfirmasi Password')); ?>
		<?php echo $form->error($model,'passwordKonfirm'); ?>
	<p>
    <label class="checkbox">
      <input name="" type="checkbox">
      Saya telah membaca dan menyetujui
      <a href="<?php echo Yii::app()->createUrl('/site/page/',array('view'=>'term')); ?>" target="_blank">Terms of Services</a>
    </label>
  </p>
  <p>
    <input class="block" type="submit" value="Daftar Akun">
  </p>

<?php $this->endWidget(); ?>
  </div>
    </div>
  </div>