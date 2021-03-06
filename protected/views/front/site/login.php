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
          <?php if ($model->getError('statusKonfirm') or Yii::app()->user->hasFlash('statusKonfirm')): 
            if(Yii::app()->user->hasFlash('statusKonfirm')){
                Yii::app()->user->getFlash('statusKonfirm');
            }
          ?>
            <div class="alert alert-warning" role="alert">
              Your Email has not been confirmed click <?php echo CHtml::link('here',array('/site/sendEmailKonfirmation')) ?> to send email konfirmation
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
              <a href="<?php echo Yii::app()->createUrl('/site/forgetPassword'); ?>">Lupa Password</a>&nbsp;|
              <a class="" href="<?php 
              echo Yii::app()->facebook->getLoginUrl(array( 'scope'  => 'email' ,'redirect_uri'  => $this->createAbsoluteUrl('LoginFb') ));
              ?>"><i class="glyphicon glyphicon-shopping-cart"></i>Facebook Login</a>
            </span>
            <span class="pull-right">
              Belum punya akun? 
              <a href="<?php echo $this->createUrl('site/register'); ?>">Daftar!</a>
            </span>
          </p>
        <?php $this->endWidget(); ?>
        <!-- .page-form -->
      </div>
    </div>
  </div>


