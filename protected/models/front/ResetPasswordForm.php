<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ResetPasswordForm extends Member
{
	public $repassword;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public static function model($className = __CLASS__) {
        return parent::model($className);
    }

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('repassword', 'compare', 'compareAttribute'=>'password'),
            array('password','required'),
		);
	}        
	public function attributeLabels()
	{
		return array(
			'idmember'=>'Member',
			'idproduk'=>'Produk',
			'atribut'=>'Atribut',
			'qty'=>'Qty',                    
		);
	} 

}
