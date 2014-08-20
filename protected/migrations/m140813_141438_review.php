<?php

class m140813_141438_review extends CDbMigration
{
	public function up()
	{
		$this->createTable('review',array(
			'id'=>'pk',
			'idPost'=>'int',
			'idMember'=>'int',
			'kontent'=>'text',
			'ranting'=>'int',
			'time'=>'datetime',
		));
		$this->createIndex('post','review','idPost');
		$this->createIndex('member','review','idMember');
	}

	public function down()
	{
		$this->dropTable('review');
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