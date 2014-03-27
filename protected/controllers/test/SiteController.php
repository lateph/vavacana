<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actionIndex(){
		
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			echo CJSON::encode(array(
				'status'=>0,
				'error'=>$error['message']
			));
		}
	}
}