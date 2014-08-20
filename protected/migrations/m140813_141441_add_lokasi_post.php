<?php

class m140813_141441_add_lokasi_post extends CDbMigration
{
	public function up()
	{
		$this->addColumn('post','idLokasi','int');
		$this->createIndex('index_lokasi','post','idLokasi');
	}

	public function down()
	{
		$this->dropColumn('post','idLokasi');
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