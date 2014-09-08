<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ChangePasswordForm extends Member
{
	public $oldPassword;
	public $newPassword;
	public $newPassword2;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return CMap::mergeArray(parent::rules(),array(
			// email has to be a valid email address
			array('oldPassword, newPassword', 'required'),
			array('newPassword2', 'compare', 'compareAttribute'=>'newPassword'),

			array('oldPassword','verifyOldPassword'),
			// verifyCode needs to be entered correctly
		));
	}

	public function verifyOldPassword($a,$b){
		if($this->password != $this->hashPassword($this->oldPassword)){
			$this->addError('oldPassword','Password lama tidak cocok');
		}
	}
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return CMap::mergeArray(parent::attributeLabels(),array(
			'oldPassword'=>'Password Lama',
			'newPassword'=>'Password Baru',
			'newPassword2'=>'Konfirmasi Password',

		));
	}
}