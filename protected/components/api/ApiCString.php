<?php
class ApiCString extends ApiCObject{
	protected function getValue($value){
		return (string)$value;
	}
}