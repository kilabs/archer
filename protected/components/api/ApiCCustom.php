<?php
class ApiCCustom extends ApiCObject{
	public $func;
	public function __construct($cols,$func){
		parent::__construct($cols);
		$this->func = $func;
	}
	protected function getValue($value){
		return call_user_func_array($this->func, array($value));
	}
}