<?php

class SiteController extends ApiController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->send(array('ok'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionLogin()
	{
		$model = new ApiLoginForm();
		$model->attributes = $_POST;
		if($model->validate()){
			$member = Member::model()->find('email = :email',array(':email'=>$model->user));
			if($member === null)
				$member = Member::model()->find('username = :user',array(':user'=>$model->user));
			if($member === null)
				$this->sendErrorMessage('User Not Found');
			if($member->validatePassword($model->password)){
				$member->generateToken();
				$this->send(array(
					'token'=>$member->token,
				));
			}
			else{
				$this->sendErrorMessage('Wrong User or password');
			}
		}else{
			$this->sendErrorMessage('Wrong User or password');
		}
		
	}

	public function actionRegister(){
		$model = new ApiRegisterForm();
		$model->attributes = $_POST;
		if($model->validate()){
			if($model->password and $model->passwordKonfirm){
				$model->password = $model->hashPassword($model->password);
				$model->passwordKonfirm = $model->hashPassword($model->passwordKonfirm);
			}
			$model->save(false);	
			$model->generateToken();
			$this->send(array(
				'token'=>$model->token,
			));
		}else{
			$this->send($model->getErrors(),0);
		}
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			$this->sendErrorMessage($error['message']);
		}
	}
}