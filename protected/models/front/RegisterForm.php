<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class RegisterForm extends Member
{
	public $passwordKonfirm;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// email has to be a valid email address
			array('username,email,password,passwordKonfirm', 'required'),
			array('username,email','unique'),

			array('passwordKonfirm', 'compare', 'compareAttribute'=>'password'),
			// verifyCode needs to be entered correctly
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}