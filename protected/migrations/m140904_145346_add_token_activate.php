<?php

class m140904_145346_add_token_activate extends CDbMigration
{
	public function up()
	{
		$this->addColumn('member','tokenActiveRegister','varchar(32)');
		$this->createIndex('token_active','member','tokenActiveRegister');
	}

	public function down()
	{
		$this->dropColumn('member','tokenActiveRegister');
		$this->dropIndex('token_active','member');
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