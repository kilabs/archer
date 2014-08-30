<?php

class m140830_091016_add_parent extends CDbMigration
{
	public function up()
	{
		$this->addColumn('kategori','idParent','int DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('kategori','idParent');
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