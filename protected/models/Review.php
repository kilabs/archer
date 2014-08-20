<?php

/**
 * This is the model class for table "review".
 *
 * The followings are the available columns in table 'review':
 * @property integer $id
 * @property integer $idPost
 * @property integer $idMember
 * @property string $kontent
 * @property integer $rating
 * @property string $time
 */
class Review extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Review the static model class
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
		return 'review';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPost, idMember, rating', 'numerical', 'integerOnly'=>true),
			array('kontent, time', 'safe'),
			array('kontent, rating, idPost, idMember', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idPost, idMember, kontent, rating, time', 'safe', 'on'=>'search'),
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
			'member'=>array(self::BELONGS_TO,'Member','idMember'),
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
			'idMember' => 'Id Member',
			'kontent' => 'Kontent',
			'rating' => 'rating',
			'time' => 'Time',
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
		$criteria->compare('idPost',$this->idPost);
		$criteria->compare('idMember',$this->idMember);
		$criteria->compare('kontent',$this->kontent,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}