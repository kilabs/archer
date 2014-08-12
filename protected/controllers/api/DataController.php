<?php

class DataController extends ApiController
{
	public function actionLokasi(){
		$lokasi = Lokasi::model()->cache(3600)->findAll();
		$this->send(new ApiList($lokasi,1));
	}
	public function actionKategori(){
		$kategoris = Kategori::model()->cache(3600)->findAll();
		$this->send(new ApiList($kategoris));
	}
}