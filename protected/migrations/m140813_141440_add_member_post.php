<?php

class m140813_141440_add_member_post extends CDbMigration
{
	public function up()
	{
		$this->addColumn('post','idMember','int');
		$this->createIndex('index_member','post','idMember');

		$this->addColumn('member','facebook','varchar(100)');	
		$this->addColumn('member','twitter','varchar(100)');
		$this->addColumn('member','website','varchar(100)');
	
	}

	public function down()
	{
		$this->dropColumn('post','idMember');

		$this->dropColumn('member','facebook');
		$this->dropColumn('member','twitter');
		$this->dropColumn('member','website');
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