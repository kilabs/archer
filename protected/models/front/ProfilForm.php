<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ProfilForm extends Member
{
	public $fotoFile;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return CMap::mergeArray(parent::rules(),array(
			array('nomorTelepon','required'),
			array('fotoFile', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
		));
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return CMap::mergeArray(parent::rules(),array(
			'fotoFile'=>'Foto',
		));
	}
}