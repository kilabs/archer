<?php
class FrontUserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
        $record=Member::model()->findByAttributes(array('username'=>$this->username));
        if($record === null){
            $record=Member::model()->findByAttributes(array('email'=>$this->username));
        }

        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;    
        }
        else if(!$record->validatePassword($this->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->_id=$record->id;
            // $this->setState('title', $record->title);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}