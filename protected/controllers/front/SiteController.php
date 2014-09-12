<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
				'layout'=>'statis',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new FrontLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['FrontLoginForm']))
		{
			$model->attributes=$_POST['FrontLoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('user/profil'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionRegister(){
		$model = new RegisterForm();
		$fbid = Yii::app()->facebook->getUser();
        $user_info	= Yii::app()->facebook->api('/' . $fbid);
        if($fbid and isset($user_info['email'])){
			$model->email = $user_info['email'];
			$model->fbid = $fbid;
		}
		if(isset($_POST['RegisterForm'])){
			$model->attributes = $_POST['RegisterForm'];
			if($model->validate()){
				$password = $model->password;
				$model->password = $model->hashPassword($password);
				if($model->save(false)){
					$message = Yii::app()->mailgun->newMessage();
					$message->setFrom('no-reply@bengkelin.com', 'Admin', 'Andrei Baibaratsky');
					$message->addTo($model->email, 'My dear user');
					$message->setSubject('Mailgun API library test');

					$email = TemplateEmail::createTemplate(TemplateEmail::PROSES_ACTIVATION_EMAIL, array(
			            'htmls'=>array(
			           	    'link_active_email'=>Yii::app()->createAbsoluteUrl('site/activate',array('token'=>$model->generateTokenActive())),
			            ),
			        ));
					// You can use views to build your messages instead of setText() or setHtml():
					$message->setHtml($email);
					
					if($message->send()){
						Yii::log($email, 'info', 'SendingEmail');
					}
					else{
						Yii::log($email, 'error', 'SendingEmail');
					}

					$this->redirect(array('site/activeSend'));
				}
			}	
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}

	public function  actionTest(){

		
    }

    public function actionActiveSend(){
    	$this->render('activeSend');
    }

    public function actionActivate($token){
    	$model = Member::model()->find('tokenActiveRegister = :token',array(
    		':token'=>$token,
    	));

    	if($model === null){
    		throw new CHttpException("Page you're looking Not Found");
    	}
    	$model->status = Member::STATUS_ACTIVE;
    	$model->save(false);

    	$_identity=new FrontUserIdentity($model->username,$model->password);
    	$status = $_identity->authenticateHashed();
		if($status == FrontUserIdentity::ERROR_NONE){
			Yii::app()->user->login($_identity,3600*24);
			$this->redirect(array('site/index'));
		}
		else{
			throw new CHttpException("Page you're looking Not Found");
		}
    }

    public function actionSendEmailKonfirmation(){
    	$error = false;
    	if (isset($_POST['email'])) {
    		$model = Member::model()->find('email = :email',array(
    			':email'=>$_POST['email'],
    		));
    		if($model === null){
    			$error = 'Email Not Found';
    		}
    		else{
    			$message = Yii::app()->mailgun->newMessage();
				$message->setFrom('no-reply@bengkelin.com', 'Admin');
				$message->addTo($model->email, 'My dear user');
				$message->setSubject('Mailgun API library test');

    			$email = TemplateEmail::createTemplate(TemplateEmail::PROSES_ACTIVATION_EMAIL, array(
		            'htmls'=>array(
		           	    'link_active_email'=>Yii::app()->createAbsoluteUrl('site/activate',array('token'=>$model->generateTokenActive())),
		            ),
		        ));
				// You can use views to build your messages instead of setText() or setHtml():
				$message->setHtml($email);
				
				if($message->send()){
					Yii::log($email, 'info', 'SendingEmail');
					$this->redirect(array('site/ActiveSend'));
				}
				else{
					Yii::log($email, 'error', 'SendingEmail');
				}
    		}    		
    	}

		$this->render('send-email-konfrimation',array(
			'error'=>$error,
		));
    }

    public function actionForgetPassword(){
        $model = new ResetPassword('create');
        if(isset($_POST['ResetPassword'])){
            $model->attributes = $_POST['ResetPassword'];
            if($model->save()){
                Yii::app()->user->setFlash('ResetPassword','Password request hes been send. please check your email for reset password.');
               	

               	$message = Yii::app()->mailgun->newMessage();
				$message->setFrom('no-reply@bengkelin.com', 'Admin');
				$message->addTo($model->email, 'My dear user');
				$message->setSubject('Mailgun API library test');

    			$email = TemplateEmail::createTemplate(TemplateEmail::RESET_PASSWORD, array(
                    'htmls'=>array(
                        'link_reset'=>Yii::app()->createAbsoluteUrl('/site/resetPassword',array('token'=>$model->token)),
                    ),
                ));
				// You can use views to build your messages instead of setText() or setHtml():
				$message->setHtml($email);
				
				if($message->send()){
					Yii::log($email, 'info', 'SendingEmail');
					$this->refresh();
					Yii::app()->end();
				}
				else{
					Yii::log($email, 'error', 'SendingEmail');
				}

                $this->refresh();
                Yii::app()->end();
            }
        }
        
        $this->render('forgetPassword',array(
            'model'=>$model,
        ));
    }
    public function actionResetPassword($token){
            $reset = ResetPassword::model()->find('token=:token',array(
                ':token'=>$token,
            ));
            if($reset==null)
                throw new CHttpException('Link Tidak Valid');

            if(strtotime($reset->tgl_expired) < time() or $reset->tgl_reset != null or $reset->status == 1){
                throw new CHttpException('Link Sudah Kadarluarsa');
            }

            $model = ResetPasswordForm::model()->find('email = :email',array(
                ':email'=>$reset->email,
            ));

            if(isset($_POST['ResetPasswordForm'])){
                $model->attributes = $_POST['ResetPasswordForm'];
                if($model->validate()){
                	$model->password  = $model->hashPassword($model->password);
                	$model->save(false);
                    Yii::app()->user->setFlash('ResetPasswordForm','Password request hes been send. please check your email for reset password.');
                    $reset->tgl_reset = date('Y-m-d H:i:s');
                    $reset->status = 1;
                    if($reset->save()){

                    }
                    else{

                    }

                    $this->redirect(array('/site/login'));
                    Yii::app()->end();
                }
            }
            $model->password = '';
            $model->repassword = '';
            $this->render('resetpasswordform',array(
                'model'=>$model,
            ));
        }

    public function actionLoginFb(){
        $fbid = Yii::app()->facebook->getUser();
        $user_info	= Yii::app()->facebook->api('/' . $fbid);
        if($fbid and isset($user_info['email'])){
        	
            $member = Member::model()->findByAttributes(array('email'=>$user_info['email']));
            if($member == null){ 
                $this->redirect(array('register'));
            }
            $auth = new FrontUserIdentity($member->email, $member->password);
            if ($auth->authenticateHashed() == FrontUserIdentity::ERROR_NONE){
                //if (Yii::app()->user->role == '99'){
                //    $this->redirect('default/index');
                //}else{
                Yii::app()->user->login($auth,0);  
                
                $session = Yii::app()->session;
                if(isset($session['returnUrl'])){
                    $url = $session['returnUrl'];
                    unset($session['returnUrl']);
                    $this->redirect($url);
                }
                else{
                    $this->redirect(array('user/profil'));
                }
            }
            else{
                $this->redirect(array('register'));
            }
        }
        else{
            $this->redirect(Yii::app()->facebook->getLoginUrl(array('scope'	=> 'email')));
        }
    }
}