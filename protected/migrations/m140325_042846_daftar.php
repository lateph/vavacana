<?php

class m140325_042846_daftar extends CDbMigration
{
	public function up()
	{
		$this->createTable('daftar',array(
			'id'=>'pk',
			'time'=>'datetime',
			'judul'=>'varchar(255)',
			'namaGambar'=>'varchar(255)',
			'mimeGambar'=>'varchar(255)',
			'namaZip'=>'varchar(255)',
			'mimeZip'=>'varchar(255)',
		));
	}

	public function down()
	{
		$this->dropTable('daftar');
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