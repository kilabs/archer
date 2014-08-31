<?php

class m140831_160051_add extends CDbMigration
{
	public function up()
	{
		$this->createIndex('index_slug','kategori','slug');
	}

	public function down()
	{
		$this->dropIndex('index_slug','kategori');
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