<?php

class m140327_055957_add_zip_io_zip_android extends CDbMigration
{
	public function up()
	{
		$this->addColumn('daftar','diskripsi','text');
		$this->addColumn('daftar','namaZipIOS','varchar(255)');
		$this->addColumn('daftar','mimeZipIOS','varchar(255)');
		$this->addColumn('daftar','namaZipAndroid','varchar(255)');
		$this->addColumn('daftar','mimeZipAndroid','varchar(255)');
		
		$this->dropColumn('daftar','namaZip');
		$this->dropColumn('daftar','mimeZip');
	}

	public function down()
	{
		$this->dropColumn('daftar','diskripsi');

		$this->dropColumn('daftar','namaZipIOS');
		$this->dropColumn('daftar','mimeZipIOS');
		$this->dropColumn('daftar','namaZipAndroid');
		$this->dropColumn('daftar','mimeZipAndroid');

		// $this->addColumn('daftar','namaZip','varchar(255)');
		// $this->addColumn('daftar','mimeZip','varchar(255)');
		
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