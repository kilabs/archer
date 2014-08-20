<?php

class m140804_054816_master_kategori extends CDbMigration
{
	public function up()
	{
		$this->createTable('kategori',array(
			'id'=>'pk',
			'nama'=>'varchar(200)',
			'status'=>'int(4)',
			'urut'=>'int(4) default 0',
			'slug'=>'varchar(200)',
		));
		$this->createIndex('index_status','kategori','status');
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