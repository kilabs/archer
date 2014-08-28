<?php

class SiteController extends ApiController
{
	public function actions()
	{
	    return array(
	        'page'=>array(
	            'class'=>'CViewAction',
	        ),
	    );
	}
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

	public function actionChangePassword(){
		$member = $this->getMember(@$_POST['token'],'ApiChangePasswordForm');
		$member->attributes = $_POST;
		if($member->validatePassword($member->oldPassword)){
			$member->password = $member->hashPassword($member->newPassword);
			if($member->save()){
				$this->sendSuccessMessage('Password Tersimpan');
			}
			else{
				$this->send($member->getErrors(),0);
			}
		}
		else
			$this->sendErrorMessage('Password Lama Tidak Cocok');
	}

	public function actionProfile(){
		$member = $this->getMember(@$_POST['token']);
		$this->send(new ApiSingle($member,1,array(
			'namaLengkap',
			'username',
			'email',
			'nomorTelepon',
			'facebook',
			'twitter',
			'website',
			'bio',
			new ApiCCustom('foto',function($value){
				return LUpload::raw('Profil',$value,true);
			}),
		)));
	}

	public function actionUpdateProfile(){
		$member = $this->getMember(@$_POST['token'],'ApiUpdateProfilForm');
		$member->attributes = @$_POST;
		$member->fotoFile=CUploadedFile::getInstanceByName('fotoFile');
		if($member->validate()){
			if($member->fotoFile){
				$member->foto = LUpload::upload($member->fotoFile,'Profil');	
			}
			$member->save();
			$this->sendSuccessMessage('Profil Tersimpan');
		}
		else{
			$this->send($member->getErrors(),0);
		}
	}
}