<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class MemberForm extends Member
{
	public $password1;
	public $password2;
	public $fotoFile;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return CMap::mergeArray(parent::rules(),array(
			// email has to be a valid email address
			array('username,email','unique'),
			array('password1','required','on'=>'create'),

			array('password2', 'compare', 'compareAttribute'=>'password1'),

			array('fotoFile', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			// verifyCode needs to be entered correctly
		));
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return CMap::mergeArray(parent::attributeLabels(),array(
			'password1'=>'Password',
			'password2'=>'Re-enter password',
			'fotoFile'=>'Foto',
		));
	}
}