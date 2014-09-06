<?php

class m140906_043218_add_sessionID extends CDbMigration
{
	public function up()
	{
		$this->addColumn('post_galery','sessionID','varchar(32)');
		$this->createIndex('post_galery_session','post_galery','sessionID');
	}

	public function down()
	{
		$this->dropIndex('post_galery_session','post_galery');
		$this->dropColumn('post_galery','sessionID');
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