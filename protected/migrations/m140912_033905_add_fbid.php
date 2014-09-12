<?php

class m140912_033905_add_fbid extends CDbMigration
{
	public function up()
	{
		$this->addColumn('member','fbid','bigint');
	}

	public function down()
	{
		$this->dropColumn('member','fbid');
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