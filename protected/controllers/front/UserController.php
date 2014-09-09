<?php

class UserController extends Controller
{
	public $layout = 'profil';
	public $menuProfils = array(
		'editProfil'=>array('label'=>'Edit profil','url'=>array('/user/profil')),
		'gantiPassword'=>array('label'=>'Ganti Password','url'=>array('/user/gantiPassword')),
		'listBengkel'=>array('label'=>'Layanan','url'=>array('/user/daftarBengkel')),
	);

	public function actionProfil()
	{
		
		$model = Member::model('ProfilForm')->findByPk(Yii::app()->user->id);
		if($model === null){
			$this->redirect('login');
		}

		if(isset($_POST['ProfilForm'])){
			$model->attributes = $_POST['ProfilForm'];
			$model->fotoFile=CUploadedFile::getInstance($model,'fotoFile');
			if($model->validate()){
				if($model->fotoFile){
					$model->foto = LUpload::upload($model->fotoFile,'Profil');
				}
				$model->save();
				$this->refresh();
			}
		}
		$this->render('profil',array(
			'model'=>$model,
		));
	}

	public function actionDaftarBengkel()
	{
		$member = Member::model('ProfilForm')->findByPk(Yii::app()->user->id);
		if($member === null){
			$this->redirect('login');
		}

		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Post'])){
			$model->attributes=$_GET['Post'];
		}
		$model->idMember = $member->id;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model=new Post('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->lat = -6.2087634;
		$model->lng = 106.8455989;
		$model->zoom = 10;
		$model->idLokasi = 83;
		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$model->idMember = Yii::app()->user->id;
			$model->fotoFile=CUploadedFile::getInstance($model,'fotoFile');
			if($model->validate()){
				if($model->fotoFile){
					$model->foto = LUpload::upload($model->fotoFile,'Post');
				}
				$model->save();
				PostGalery::model()->updateAll(array(
					'idPost'=>$model->id,
					'sessionID'=>null,
				),'sessionID=:sessionID',array(
					':sessionID'=>Yii::app()->session->getSessionID()
				));
				$_cover = PostGalery::model()->find('idPost = :id',array(
					':id'=>$model->id,
				));
				if($_cover){
					$model->galeryId = $_cover->id;
					$model->save();
				}
				$this->redirect(array('view','id'=>$model->id));
			}	
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null or $model->idMember != Yii::app()->user->id)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->kontent = $model->detail->kontent;

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$model->fotoFile=CUploadedFile::getInstance($model,'fotoFile');
			if($model->validate()){
				if($model->fotoFile){
					$model->foto = LUpload::upload($model->fotoFile,'Post');
				}
				$model->save();

				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionGalery($id)
	{
		$model=$this->loadModel($id);
		$galery = new PostGalery('create');
		$galery->idPost = $id;
		//print_r($_POST); exit;
		if(isset($_POST['PostGalery']))
		{
			$galery->attributes=$_POST['PostGalery'];
			$galery->imageFile=CUploadedFile::getInstance($galery,'imageFile');
			$galery->idPost = $model->id;
			if($galery->validate()){
				if($galery->imageFile){
					$galery->image = LUpload::upload($galery->imageFile,'PostGalery');
					$galery->save();
					$this->redirect(array('galery','id'=>$model->id));
				}
			}
		}

		$this->render('galery',array(
			'model'=>$model,
			'newGalery'=>$galery,
		));
	}

	public function actionUploadGalery(){
		$galery = new PostGalery('create');  
		$galery->imageFile=CUploadedFile::getInstanceByName('file');
		$galery->sessionID = Yii::app()->session->getSessionID();
		if($galery->validate()){
			if($galery->imageFile){
				$galery->image = LUpload::upload($galery->imageFile,'PostGalery');
				$galery->save();
			}
		}
	}

	public function actionLatlongLokasi(){
		$lokasi = Lokasi::model()->findByPk(@$_POST['id']);
		if($lokasi)
			echo CJSON::encode($lokasi);
		else
			echo CJSON::encode(false); 
	}

	public function actionGantiPassword()
	{
		$model= ChangePasswordForm::model('ChangePasswordForm')->findByPk(Yii::app()->user->id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			if($model->validate()){
				$this->setFlash('changePassword','Password Telah Berhasil Dirubah');
				$model->password = $model->hashPassword($model->newPassword);
				$model->save(false);
				$this->refresh();
			}
		}

		$this->render('changePassword',array(
			'model'=>$model,
		));
	}
}
	