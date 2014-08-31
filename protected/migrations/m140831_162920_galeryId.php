<?php

class m140831_162920_galeryId extends CDbMigration
{
	public function up()
	{
		$this->addColumn('post','galeryId','int');
	}

	public function down()
	{
		$this->dropColumn('post','galeryId');
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