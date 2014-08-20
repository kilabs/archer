<?php
class ApiCInt extends ApiCObject{
	protected function getValue($value){
		return (int)$value;
	}
}