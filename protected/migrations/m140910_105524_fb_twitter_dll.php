<?php

class m140910_105524_fb_twitter_dll extends CDbMigration
{
	public function up()
	{
		$this->addColumn('post','facebook','varchar(100)');	
		$this->addColumn('post','twitter','varchar(100)');
		$this->addColumn('post','website','varchar(100)');
	}

	public function down()
	{
		$this->dropColumn('post','facebook');
		$this->dropColumn('post','twitter');
		$this->dropColumn('post','website');
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