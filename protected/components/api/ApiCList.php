<?php
class ApiCList extends ApiCObject{
	public $subcols;
	public $add;
	public function __construct($cols,$subcols=array(),$add=array()){
		parent::__construct($cols);
		$this->subcols = $subcols;
		$this->add = $add;
	}
	protected function getValue($value){
		return $this->renderList($value);
	}
	private function assign(&$_data,$row,$cols,$key){
        if(!($cols instanceof ApiCObject)){
            $cols = new ApiCObject($cols);
        }
        $cols->setData($_data,$row,$key);
        $cols->renderColumn();
    }
	public function renderList($value){
        $data = array();
        foreach($value as $row){
            $_data = array();
            if(empty($this->subcols)){
                $_data = $row;  
            }
            else{
                foreach($this->subcols as $key=>$col){
                    $this->assign($_data,$row,$col,$key);
                }
            }

            if(empty($this->add)){
                foreach($this->add as $key=>$col){
                    $this->assign($_data,$row,$col,$key);
                }
            }
            $data[] = $_data;
        }

        return $data;
    }
}