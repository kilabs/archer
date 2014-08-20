<?php

/**
 * This is the model class for table "post_galery".
 *
 * The followings are the available columns in table 'post_galery':
 * @property integer $id
 * @property integer $idPost
 * @property string $image
 */
class PostGalery extends CActiveRecord
{
	public $imageFile;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post_galery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPost', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>64),
			array('imageFile', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true,'on'=>'create'),
			array('imageFile', 'required','on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idPost, image', 'safe', 'on'=>'search'),
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
			'idPost' => 'Id Post',
			'image' => 'Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('idPost',$this->idPost);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PostGalery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
