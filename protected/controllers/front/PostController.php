<?php

class PostController extends Controller
{
	public function actionKategori($id,$slug)
	{
		$this->render('index');
	}

	public function actionDetail($id,$slug){
		$post = Post::model()->with(array('reviews'))->findByPk($id);
		if($post === null)
			throw new CHttpException('Bengkel Tidak Ditmukan');

		$newReview = new Review();
		if(isset($_POST['Review'])){
			$newReview->attributes = $_POST['Review'];
			$newReview->idPost = $id;
			$newReview->time = date('Y-m-d H:i:s');
			$newReview->idMember = Yii::app()->user->getId();
			if($newReview->save()){
				$this->refresh();
			}
		}
		$this->render('detail',array(
			'post'=>$post,
			'newReview'=>$newReview,
		));
	}

	public function actionList($kategori=null){
		$kategori = Kategori::model()->find('slug = :slug',array(
			':slug'=>$kategori,
		));

		$criteria = new CDbCriteria();
		$criteria->limit = 2;
		$dataProvider=new CActiveDataProvider('Post',array(
			'criteria'=>$criteria,
		));

		$this->render('list',array(
			'kategori'=>$kategori,
			'dataProvider'=>$dataProvider,
		));
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}