<?php

class m140813_141436_member extends CDbMigration
{
	public function up()
	{
		$this->createTable('member',array(
			'id'=>'pk',
			'username'=>'varchar(100)',
			'email'=>'varchar(100)',
			'password'=>'varchar(100)',
			'token'=>'varchar(32)',
		));
		$this->createIndex('index_username','member','username',true);
		$this->createIndex('index_email','member','email',true);
		$this->createIndex('index_token','member','token');
	}

	public function down()
	{
		$this->dropTable('member');
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