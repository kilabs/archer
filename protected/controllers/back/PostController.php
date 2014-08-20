<?php

class PostController extends BackendController
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
		//		'actions'=>array('*'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->lat = -6.2087634;
		$model->lng = 106.8455989;
		$model->zoom = 10;

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

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
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

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->redirect('index');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
