<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ApiController extends CController
{
	public function send($data,$status=1){
		$_json = '';
		if($data instanceof IApiJSON){
			$_json = $data->render();
		}
		else{
			$_json = array(
				'status'=>$status,
				'data'=>$data
			);
		}
		header('Content-Type: application/json');
		echo CJSON::encode($_json);
		Yii::app()->end();
	}

	public function sendErrorMessage($msg,$status=0){
		$this->send(new ApiMessage($msg,$status));
	}

	public function sendSuccessMessage($msg,$status=1){
		$this->send(new ApiMessage($msg,$status));	
	}

	public function getMember($token){
		$model = Member::model()->findByToken($token);
		if($model === null)
			$this->sendErrorMessage('Member Tidak Ditemukan',0);
		return $model;
	}
}