<?php

class m140813_141442_typo extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('review','ranting');
		$this->addColumn('review','rating','int');
	}

	public function down()
	{
		$this->addColumn('review','ranting','int');
		$this->dropColumn('review','rating');
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