<?php
class LUpload{
	public static function getUploadPath(){
		return Yii::getPathOfAlias('webroot').'/upload';
	}
	public static function getUploadUrl($abosolute=false){
		return Yii::app()->getBaseUrl($abosolute).'/upload';
	}
	public static function upload($file,$folder,$namaFile=''){
		if($namaFile == ''){
			$namaFile=md5($file->getName().rand(0,10000)).'.'.$file->getExtensionName();
		}
		$file->saveAs(self::getUploadPath().'/'.$folder.'/'.$namaFile);
		return $namaFile;
	}
	public static function thumbs($folder,$namaFile,$ukuran,$abosolute=false){
		return self::getUploadUrl($abosolute).'/thumbs/'.$folder.'/'.$namaFile.'_'.$ukuran.'.jpg';
	}
	public static function raw($folder,$namaFile,$abosolute=false){
		return self::getUploadUrl($abosolute).'/'.$folder.'/'.$namaFile;
	}
}