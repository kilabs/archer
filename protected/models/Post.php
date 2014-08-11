<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property string $judul
 * @property string $slug
 * @property integer $idKategori
 * @property string $foto
 * @property integer $status
 * @property string $tanggalBuat
 * @property string $tanggalModif
 */
class Post extends CActiveRecord
{
	const STATUS_AKTIF=1;
    const STATUS_NON_AKTIF=2;
	public $kontent;
	public $fotoFile;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idKategori, status, zoom', 'numerical', 'integerOnly'=>true),
			array('judul, slug', 'length', 'max'=>150),
			array('alamat, kota, noTelp, fbText, fbLink, twitterText, twitterLink', 'length', 'max'=>150),
			array('foto', 'length', 'max'=>64),
			array('tanggalBuat, tanggalModif, lat, lng, layanan', 'safe'),
			array('judul, slug, kontent, idKategori', 'required','on'=>'create, update'),
			array('fotoFile', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>false,'on'=>'create'),
			array('fotoFile', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true,'on'=>'update'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, judul, slug, idKategori, foto, status, tanggalBuat, tanggalModif', 'safe', 'on'=>'search'),
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
			'detail'=>array(self::HAS_ONE,'PostDetail','idPost'),
			'kategori'=>array(self::BELONGS_TO,'Kategori','idKategori'),
			'galerys'=>array(self::HAS_MANY,'Postgalery','idPost'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'judul' => 'Judul',
			'slug' => 'Slug',
			'idKategori' => 'Kategori',
			'foto' => 'Foto',
			'status' => 'Status',
			'tanggalBuat' => 'Tanggal Buat',
			'tanggalModif' => 'Tanggal Modif',
			'fotoFile'=>'Foto',
			'kategori.nama'=>'Kategori',
			'kontent'=>'Profile',
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
		$criteria->with = array('kategori');
		$criteria->compare('id',$this->id);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('idKategori',$this->idKategori);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tanggalBuat',$this->tanggalBuat,true);
		$criteria->compare('tanggalModif',$this->tanggalModif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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

	protected function beforeSave(){
		if($this->isNewRecord){
			$this->tanggalBuat = date('Y-m-d H:i:s');
			$this->tanggalModif = date('Y-m-d H:i:s');
		}
		else{
			$this->tanggalModif = date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}
	protected function afterSave(){
		if($this->detail == null){
			$this->detail = new PostDetail();
			$this->detail->idPost = $this->id;
			$this->detail->kontent = $this->kontent;
			$this->detail->save();
		}
		else{
			if($this->kontent != '' and $this->detail->kontent != $this->kontent){
				$this->detail->kontent = $this->kontent;
			}
			$this->detail->save();
		}
		return parent::afterSave();
	}
}