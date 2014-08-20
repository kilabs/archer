<?php
class LUpload{
	public static function getUploadPath(){
		return Yii::getPathOfAlias('webroot').'/upload';
	}
	public static function getUploadUrl(){
		return Yii::app()->getBaseUrl().'/upload';
	}
	public static function upload($file,$folder,$namaFile=''){
		if($namaFile == ''){
			$namaFile=md5($file->getName().rand(0,10000)).'.'.$file->getExtensionName();
		}
		$file->saveAs(self::getUploadPath().'/'.$folder.'/'.$namaFile);
		return $namaFile;
	}
	public static function thumbs($folder,$namaFile,$ukuran){
		return self::getUploadUrl().'/thumbs/'.$folder.'/'.$namaFile.'_'.$ukuran.'.jpg';
	}
	public static function raw($folder,$namaFile){
		return self::getUploadUrl().'/'.$folder.'/'.$namaFile;
	}
}