<?php

/**
 * This is the model class for table "{{template_email}}".
 *
 * The followings are the available columns in table '{{template_email}}':
 * @property integer $id
 * @property string $proses
 * @property string $indonesia
 * @property string $english
 */
class TemplateEmail extends CActiveRecord
{
        const PROSES_ACTIVATION_EMAIL = 'Activation Email';
        
        const LANG_INDONESIA = 'indonesia';
        const LANG_ENGLISH = 'english';
        
        const RESET_PASSWORD = 'Reset Password';

        public static function getMapAlias(){
            return array(
                '{{name}}'=>'[User::nama_depan]',
                '{{email}}'=>'[User::email]',
                '{{link_reset}}'=>'[link_reset]',
                '{{link_active_email}}'=>'[link_active_email]',
            );
        }
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'template_email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('proses', 'length', 'max'=>255),
			array('indonesia, english', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, proses, indonesia, english', 'safe', 'on'=>'search'),
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
			'proses' => 'Proses',
			'indonesia' => 'Indonesia',
			'english' => 'English',
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
		$criteria->compare('proses',$this->proses,true);
		$criteria->compare('indonesia',$this->indonesia,true);
		$criteria->compare('english',$this->english,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TemplateEmail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * Generate email
         * 
         * @param string $proses nama proses
         * @param array $params parameter data email
         * @param string $lang bahasa
         * @param array $deletes hapus data params yang tidak dipakai
         * @return text | boolean false jika template dengan proses tidak temukan
         */
        public static function createTemplate($proses,$params=array(),$lang=false,$deletes=array(),$format='html'){
            $model = self::model()->findByAttributes(array(
                'proses'=>$proses,
            ));
            if($model === null){
                return false;
            }
            $text = '';
            if($lang===false){
                // anggal iindo dulu
                $lang = self::LANG_INDONESIA;
            }
            if($lang == self::LANG_INDONESIA){
                $text = $model->indonesia;
            }
            else{
                $text = $model->english;
            }
            
            foreach ($deletes as $valueD) {
                $text = str_replace($valueD, '', $text);
            }
            
            $m = array();
            $tempModel = array();
            foreach (self::getMapAlias() as $keyM => $valueM) {
                $text = str_replace($keyM, $valueM, $text);
            }
            while(preg_match("/\[(.*?)::(.*?)]/",$text,$m)){
                $nameClass = $m[1];
                $replaceText = $m[0];
                $nameVariable = $m[2];
                //cari langsung
                if(isset($params[$nameClass.'::'.$nameVariable])){
                    $text = str_replace($replaceText, $params[$nameClass.'::'.$nameVariable], $text);
                    continue;
                }
                // mencoba cari dari model
                if(!isset($tempModel[$nameClass])){
                    $classInstance = call_user_func(array($nameClass, 'model'));
                    $pk = $classInstance->tableSchema->primaryKey;
                    if(isset($params[$nameClass.'::'.$pk])){
                        $modelClass = $classInstance->findByPk($params[$nameClass.'::'.$pk]);
                        if($modelClass !== null){
                            $tempModel[$nameClass] = $modelClass;
                        }
                    }
                }
                if($tempModel[$nameClass] and isset($tempModel[$nameClass]->$m[2])){
                    $newVal = $tempModel[$nameClass]->$m[2];
                }
                $text = str_replace($replaceText, $newVal, $text);
            }
            if($format == 'html'){
                $text = Yii::app()->formatter->nText($text);
            }
            
            if(isset($params['htmls'])){     
                foreach($params['htmls'] as $key=>$htmlParam){
                    $text = str_replace('['.$key.']', $htmlParam, $text);
                }
            }
            return $text;
        }
}
