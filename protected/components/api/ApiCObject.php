<?php
class ApiCObject{
	public $_data;
	public $row;
	public $cols;
	public $key;
	public function __construct($cols){
		$this->cols = $cols;
	}
	public function setData(&$_data,$row,$key){
		$this->row = $row;
		$this->_data = &$_data;
		$this->key = $key;
	}
	public function renderColumn(){
		$ex = explode('.', $this->cols);		
        if(is_numeric($this->key)){
            if(count($ex) == 1){
                $this->_data[$this->cols] = $this->getValue($this->row->{$this->cols});
            }
            if(count($ex) == 2){
                $ex0 = $ex[0];
                $ex1 = $ex[1];
                if(!isset($this->_data[$ex0])){
                    $this->_data[$ex0] = array();
                }
                $this->_data[$ex0][$ex1] = $this->getValue($this->row->$ex0->$ex1);
            }
        }
        else{
        	if(count($ex) == 1){
                $this->_data[$this->key] = $this->getValue($this->row->{$this->cols});
            }
            if(count($ex) == 2){
                $ex0 = $ex[0];
                $ex1 = $ex[1];
                if(!isset($this->_data[$ex0])){
                    $this->_data[$ex0] = array();
                }
                $this->_data[$this->key] = $this->getValue($this->row->$ex0->$ex1);
            }
        }
	}
	protected function getValue($value){
		return $value;
	}
}