<?php

class m140825_133101_profil extends CDbMigration
{
	public function up()
	{
		$this->addColumn('member','foto','varchar(64)');	
		$this->addColumn('member','namaLengkap','varchar(255)');
		$this->addColumn('member','nomorTelepon','varchar(64)');
		$this->addColumn('member','bio','text');
	}

	public function down()
	{
		$this->dropColumn('member','foto');
		$this->dropColumn('member','namaLengkap');
		$this->dropColumn('member','nomorTelepon');
		$this->dropColumn('member','bio');
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