<?php

class PostController extends ApiController
{
	public function actionIndex(){
		$perPage = 10;
		$criteria = new CDbCriteria();
		$criteria->with = array('kategori','totalReview');
		$criteria->limit  = $perPage;
		$criteria->offset = ((isset($_POST['page']) ? $_POST['page'] : 1)-1) * $perPage;
		$criteria->addCondition('t.status = :status');

		if(isset($_POST['idLokasi']) and !empty($_POST['idLokasi'])){ 
			$criteria->addColumnCondition(array(
				'idLokasi'=>$_POST['idLokasi'],
			));
		}
		if(isset($_POST['idKategori']) and !empty($_POST['idKategori'])){ 
			$criteria->addColumnCondition(array(
				'idKategori'=>$_POST['idKategori'],
			));
		}
		if(isset($_POST['search']) and !empty($_POST['search'])){
			$criteria->with[] = 'detail';
			$criteria->addCondition('t.judul like :search1 or detail.kontent like :search2');
			$criteria->params[':search1'] = '%'.$_POST['search'].'%';
			$criteria->params[':search2'] = '%'.$_POST['search'].'%';
		}

		$criteria->params[':status'] = Post::STATUS_AKTIF;
		$posts = Post::model()->findAll($criteria);
		$this->send(new ApiList($posts,1,array(
			new ApiCInt('id'),
			'judul',
			new ApiCInt('kategori.id'),
			'kategori.nama',
			'kota',
			'totalReview',
			new ApiCInt('premium'),
		)));
	}
	public function actionDetail($id){
		$post = Post::model()->with(array(
			'detail',
			'member',
		//	'reviews',
		))->findByPk($id);
		if($post==null)
			$this->sendErrorMessage('Post Tidak Ditemukan');

		$this->send(new ApiSingle($post,1,array(
			'alamat',
			'noTelp',
			'profil'=>'detail.kontent',
			'member.id',
			'member.facebook',
			'member.twitter',
			'member.website',
			'layanan',
			new ApiCList('galerys',array(
				'id',
				new ApiCCustom('image',function($value){
					return LUpload::raw('PostGalery',$value);
				}),
			)),
			'lng',
			'lat',
		)));
	}


	public function actionAdd(){
		$member = $this->getMember(@$_POST['token']);

		$post = new ApiPostForm();
		$post->idMember = $member->id;
		$post->attributes = $_POST;
		if($post->save()){
			$this->sendSuccessMessage('Post Tersimpan');
		}
		else{
			$this->send($post->getErrors(),0);
		}
	}

	public function actionReview($id){
		$post = Post::model()->findByPk(@$id);
		if($post==null)
			$this->sendErrorMessage('Post Tidak Ditemukan');

		$reviews = Review::model()->with(array('member'))->findAll('idPost=:p1',array(':p1'=>$id));
		$this->send(new ApiList($reviews,1,array(
			new ApiCInt('id'),
			'kontent',
			'time',
			new ApiCInt('rating'),
			new ApiCInt('member.id'),
			'member.username',
		)));
	}
	public function actionAddReview(){
		$post = Post::model()->findByPk(@$_POST['idPost']);
		if($post==null)
			$this->sendErrorMessage('Post Tidak Ditemukan');

		$member = $this->getMember(@$_POST['token']);
		$review = new Review('create');
		$review->attributes = @$_POST;
		$review->time = date('Y-m-d H:i:s');
		$review->idMember = $member->id;
		if($review->save()){
			$this->sendSuccessMessage('Review Tersimpan');
		}
		else{
			$this->send($review->getErrors(),0);
		}
	}
	public function actionAddImage()
	{
		$id = @$_POST['idPost'];
		$post = Post::model()->findByPk($id);
		if($post==null)
			$this->sendErrorMessage('Post Tidak Ditemukan');

		$galery = new PostGalery('create');
		$galery->idPost = $id;
		
		$galery->imageFile=CUploadedFile::getInstanceByName('imageFile');
		$galery->idPost = $post->id;
		if($galery->validate()){
			if($galery->imageFile){
				$galery->image = LUpload::upload($galery->imageFile,'PostGalery');
				$galery->save();
				$this->sendSuccessMessage('Galery Tersimpan');
			}
		}
		else{
			$this->send($galery->getErrors(),0);
		}
	}
}