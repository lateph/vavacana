<?php

class DaftarController extends ApiController
{
	public function actionIndex()
	{
		$models = Daftar::model()->findAll();
		echo CJSON::encode(array(
			'status'=>1,'data'=>$models
		));
	}

	public function actionCreate(){
		if(!isset($_POST) and empty($_POST)){
			
			throw new Exception('Data Tidak DIsertakan');
		}
		$daftar = new Daftar();
		$daftar->attributes = $_POST;
		$daftar->gambar = CUploadedFile::getInstanceByName('gambar');
		$daftar->zipIOS = CUploadedFile::getInstanceByName('zipIOS');
		$daftar->zipAndroid = CUploadedFile::getInstanceByName('zipAndroid');
		if(!$daftar->save()){
			throw new Exception('Data Gagal Disimpan');
		}
		echo CJSON::encode(array(
			'status'=>1,
		)); 
	}
}