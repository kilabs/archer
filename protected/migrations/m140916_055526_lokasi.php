<?php

class m140916_055526_lokasi extends CDbMigration
{
	public function up()
	{
		$this->addColumn('lokasi','negara','varchar(100)');
		$this->truncateTable('lokasi');

		$file = YiiBase::getPathOfAlias('application.data').'/lokasi.txt';
		$content = file_get_contents($file);
		$rows = explode("\n", $content);
		for ($i=1; $i < count($rows); $i++) { 
			$row = explode('|', $rows[$i]);
			$this->insert('lokasi',array(
				'nama'=>$row[0],
				'lat'=>$row[3],
				'lng'=>$row[2],
				'negara'=>$row[5],
			));
		}
	}

	public function down()
	{
		$this->dropColumn('lokasi','negara');
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