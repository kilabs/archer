<?php

class m140812_135848_post extends CDbMigration
{
	public function up()
	{
		$this->createTable('post',array(
			'id'=>'pk',
			'judul'=>'varchar(150)',
			'slug'=>'varchar(150)',
			'idKategori'=>'int',
			'foto'=>'varchar(64)',
			'status'=>'int(4)',
			'tanggalBuat'=>'datetime',
			'tanggalModif'=>'datetime',
		));
		$this->createIndex('index_status','post','status');
		$this->createIndex('index_kategori','post','idKategori');
		$this->createIndex('index_kategori_status','post','idKategori,status');

		$this->createTable('post_detail',array(
			'idPost'=>'int',
			'kontent'=>'text',
		));
		$this->createIndex('index_post','post_detail','idPost',true);
	}

	public function down()
	{
		$this->dropTable('post');
		$this->dropTable('post_detail');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}