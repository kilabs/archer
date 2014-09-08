<?php

/**
 * This is the model class for table "{{reset_password}}".
 *
 * The followings are the available columns in table '{{reset_password}}':
 * @property string $id
 * @property string $tgl_request
 * @property string $email
 * @property string $token
 * @property string $tgl_reset
 * @property string $tgl_expired
 * @property string $status
 */
class ResetPassword extends CActiveRecord
{	
	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reset_password';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'length', 'max'=>64),
			array('token', 'length', 'max'=>256),
			array('token', 'unique'),
			array('status', 'length', 'max'=>8),
			array('tgl_request, tgl_reset, tgl_expired', 'safe'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'create'),
			array('email', 'email'),
			array('email', 'hari','on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tgl_request, email, token, tgl_reset, tgl_expired, status', 'safe', 'on'=>'search'),
		);
	}

	 public function hari($attribute, $params) {
	 	$model=Member::model()->find('email = :email',array(':email'=>$this->email));
	 	if($model == null){
	 		echo $this->email;
	 		$this->addError('email', 'Email cannot be blank');
	 	}

	 	$model = self::model()->find('email = :p1 and tgl_expired >= :expired',array(
	 		':p1'=>$this->email,
	 		':expired' => date('Y-m-d H:i:s'),
	 	));
        if($model)
            $this->addError('email', 'please reset password another day');
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
			'tgl_request' => 'Tgl Request',
			'email' => 'Email',
			'token' => 'Token',
			'tgl_reset' => 'Tgl Reset',
			'tgl_expired' => 'Tgl Expired',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('tgl_request',$this->tgl_request,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('tgl_reset',$this->tgl_reset,true);
		$criteria->compare('tgl_expired',$this->tgl_expired,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ResetPassword the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave(){
		if($this->isNewRecord){
			$this->tgl_request = date('Y-m-d H:i:s');
			$this->status = "0";
			do{
				$token = md5($this->getToken());
			}while(self::model()->find('token=:p1',array(':p1'=>$token))!=null);
			$this->token = $token;
			$this->tgl_expired = date("Y-m-d H:i:s", time()+86400);
		}
		return parent::beforeSave();
	}

	function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
	}

	function getToken($length=32){
	    $token = "";
	    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	    $codeAlphabet.= "0123456789";
	    for($i=0;$i<$length;$i++){
	        $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
	    }
	    return $token;
	}
}
