<?php
class ApiSingle implements IApiJSON{
	protected $model;
	protected $status; 
    protected $cols;
    protected $add;
    protected $del;

	function __construct($model,$status=1,$cols=array(),$add=array(),$del=array()) {
    	$this->model = $model;
    	$this->status = $status;
        $this->cols = $cols;
        $this->add = $add;
        $this->del = $del;
    } 

    private function assign(&$_data,$row,$cols,$key){
        if(!($cols instanceof ApiCObject)){
            $cols = new ApiCObject($cols);
        }
        $cols->setData($_data,$row,$key);
        $cols->renderColumn();
    }
    public function render(){
        $data = array();
        $row = $this->model;
        
        $_data = array();
        if(empty($this->cols)){
            $_data = $row;  
        }
        else{
            foreach($this->cols as $key=>$col){
                $this->assign($_data,$row,$col,$key);
            }
        }

        if(empty($this->add)){
            foreach($this->add as $key=>$col){
                $this->assign($_data,$row,$col,$key);
            }
        }
        $data = $_data;

    	return array(
    		'status'=>$this->status,
    		'data'=>$data,
    	);
    }
}