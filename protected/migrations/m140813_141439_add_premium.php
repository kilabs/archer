<?php

class m140813_141439_add_premium extends CDbMigration
{
	public function up()
	{
		$this->addColumn('post','premium','int default 0');
	}

	public function down()
	{
		$this->dropColumn('post','premium');
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