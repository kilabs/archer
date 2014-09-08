<?php

class m140908_071642_reset_password extends CDbMigration
{
	public function up()
	{
        $this->createTable('reset_password',array(
			'id' => 'bigint(20) AUTO_INCREMENT PRIMARY KEY',
			'tgl_request' => 'datetime',
			'email' => 'VARCHAR(64)',
			'token' => 'varchar(256)',
			'tgl_reset' => 'datetime',
			'tgl_expired' => 'datetime',
			'status' => 'varchar(8)'
		));
		$this->createIndex('token','reset_password','token');  

		$this->insert('template_email', array(
           'proses'=>'Reset Password',
           'indonesia'=>'Pelanggan Yth.,

Klik Link berikut untuk melakukan reset password

{{link_reset}} ',
        ));          
	}

	public function down()
	{
        $this->dropTable('reset_password');
		$this->delete('template_email', 'proses = :proses',array(
			':proses'=>'Reset Password',
		));
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