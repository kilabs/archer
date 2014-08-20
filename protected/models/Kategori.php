<?php

/**
 * This is the model class for table "kategori".
 *
 * The followings are the available columns in table 'kategori':
 * @property integer $id
 * @property string $nama
 * @property integer $status
 * @property integer $urut
 * @property string $slug
 */
class Kategori extends CActiveRecord
{
	const STATUS_AKTIF=1;
    const STATUS_NON_AKTIF=2;
    public $imageFile;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kategori the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kategori';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, urut', 'numerical', 'integerOnly'=>true),
			array('nama, slug', 'length', 'max'=>200),
			array('nama','required'),
			array('imageFile', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true,'on'=>'create'),
			array('imageFile', 'required','on'=>'create'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, status, urut, slug', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'status' => 'Status',
			'urut' => 'Urut',
			'slug' => 'Slug',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('urut',$this->urut);
		$criteria->compare('slug',$this->slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function listStatus(){
		return array(
			self::STATUS_AKTIF => 'Aktif',
			self::STATUS_NON_AKTIF => 'Tidak Aktif',
		);
	}

	public function getStatus(){
		$ar = self::listStatus();
		return @$ar[$this->status];
	}
}