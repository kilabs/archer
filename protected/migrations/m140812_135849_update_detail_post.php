<?php

class m140812_135849_update_detail_post extends CDbMigration
{
	public function up()
	{
		$this->addColumn('post','alamat','varchar(200)');
		$this->addColumn('post','kota','varchar(200)');

		$this->addColumn('post','layanan','varchar(500)');
		$this->addColumn('post','lat','DECIMAL(10, 8) NOT NULL');
		$this->addColumn('post','lng','DECIMAL(11, 8) NOT NULL');
		$this->addColumn('post','zoom','int');

		$this->addColumn('post','noTelp','varchar(200)');
		$this->addColumn('post','fbText','varchar(200)');
		$this->addColumn('post','fbLink','varchar(200)');
		$this->addColumn('post','twitterText','varchar(200)');
		$this->addColumn('post','twitterLink','varchar(200)');
	}

	public function down()
	{
		$this->dropColumn('post','alamat');
		$this->dropColumn('post','kota');

		$this->dropColumn('post','layanan');
		$this->dropColumn('post','lat');
		$this->dropColumn('post','lng');
		$this->dropColumn('post','zoom');
		
		$this->dropColumn('post','noTelp');
		$this->dropColumn('post','fbText');
		$this->dropColumn('post','fbLink');
		$this->dropColumn('post','twitterText');
		$this->dropColumn('post','twitterLink');
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