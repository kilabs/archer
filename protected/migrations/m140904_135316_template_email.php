<?php

class m140904_135316_template_email extends CDbMigration
{
	public function up()
	{
        $this->createTable('template_email', array(
            'id'=>'pk',
            'proses'=>'varchar(255)',
            'indonesia'=>'text',
            'english'=>'text',
        ));
        $this->createIndex('index_proses', 'template_email', 'proses', true);
        $this->insert('template_email', array(
           'proses'=>TemplateEmail::PROSES_ACTIVATION_EMAIL,
           'indonesia'=>'Silahkan ikuti link berikut
{{link_active_email}}',
			'english'=>'Please Follow This link
{{link_active_email}}',
        ));
        $this->addColumn('member','status','int default 0');
	}

	public function down()
	{
		$this->dropTable('template_email');
		$this->dropColumn('member','status');
	}
}