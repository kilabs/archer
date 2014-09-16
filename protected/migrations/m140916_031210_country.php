<?php

class m140916_031210_country extends CDbMigration
{
	public function up()
	{
		$this->createTable('negara',array(
			'id'=>'pk',
			'languageCode'=>'varchar(10)',
			'countryName'=>'varchar(100)',
			'countryCode'=>'varchar(100)',
			'transliteration'=>'varchar(100)',
			'continentID'=>'int',
		));

		$file = YiiBase::getPathOfAlias('application.data').'/CountryList.txt';
		$content = file_get_contents($file);
		$rows = explode("\n", $content);
		for ($i=1; $i < count($rows); $i++) { 
			$row = explode('|', $rows[$i]);
			$this->insert('negara',array(
				'id'=>$row[0],
				'languageCode'=>$row[1],
				'countryName'=>$row[2],
				'countryCode'=>$row[3],
				'transliteration'=>$row[4],
				'continentID'=>$row[5],
			));
		}
	}

	public function down()
	{
		$this->dropTable('negara');
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