<?php

class m140813_141435_kategori_image extends CDbMigration
{
	public function up()
	{
		$this->addColumn('kategori','image','varchar(64)');
	}

	public function down()
	{
		$this->dropTable('kategori');
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