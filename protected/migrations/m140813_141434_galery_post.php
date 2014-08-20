<?php

class m140813_141434_galery_post extends CDbMigration
{
	public function up()
	{
		$this->createTable('post_galery',array(
			'id'=>'pk',
			'idPost'=>'int',
			'image'=>'varchar(64)',
		));
		$this->createIndex('index_post','post_galery','idPost');
	}

	public function down()
	{
		$this->dropTable('post_galery');
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