<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


	<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        	<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
				'htmlOptions'=>array('class'=>'clearfix page-form'),
			)); ?>
          <h2 class="roboto">Login</h2>
          <hr>
          <p>Isikan username dan Password</p>
          <p>
      		<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'username')); ?>
      		<?php echo $form->error($model,'username'); ?>
      	 </p>
                <p>
      		<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'password')); ?>
      		<?php echo $form->error($model,'password'); ?>
          <?php if ($model->getError('statusKonfirm')): ?>
            <div class="alert alert-warning" role="alert">
              Your Email has not been konfirmed klik <?php echo CHtml::link('here',array('/site/sendEmailKonfirmation')) ?> to send email konfirmation
            </div>
          <?php endif ?>
		   </p>
          <p class="clearfix">
            <span class="checkbox pull-left">
              <?php echo $form->checkBox($model,'rememberMe'); ?>
              <label>Keep me signed in</label>
            </span>
            <input class="pull-right" type="submit" value="Login">
          </p>
          <hr>
          <p class="clearfix">
            <span class="pull-left">
              <a href="#">Forgot Password</a>
            </span>
            <span class="pull-right">
              Don't have an account yet?
              <a href="<?php echo $this->createUrl('site/register'); ?>">Create an account</a>
            </span>
          </p>
        <?php $this->endWidget(); ?>
        <!-- .page-form -->
      </div>
    </div>
  </div>


