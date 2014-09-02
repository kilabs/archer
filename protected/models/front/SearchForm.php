<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SearchForm extends CFormModel
{
	public $q;
	public $idLokasi;
	public $sort;

	const SORT_TERBARU = 1;
	const SORT_TERPOPULER = 2;
	const SORT_TERMURAH = 3;
	const SORT_TERMAHAL = 4;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return CMap::mergeArray(parent::rules(),array(
			// username and password are required
			array('q,idLokasi', 'safe'),
		));
	}

	public static function listSort(){
		return array(
			self::SORT_TERBARU => 'Terbaru',
			self::SORT_TERPOPULER => 'Terpopuler',
			self::SORT_TERMURAH => 'Termurah',
			self::SORT_TERMAHAL => 'Termahal',
		);
	}

	public function getSort(){
		$ar = self::listStatus();
		return @$ar[$this->status];
	}
}
