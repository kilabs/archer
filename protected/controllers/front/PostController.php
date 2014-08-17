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
		$this->render('detail',array(
			'post'=>$post,
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