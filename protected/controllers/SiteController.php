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
			),
		);
	}
    /**
     * Displays a success page.
     * The success page content is specified via the flash data '_success_'
     * which is generated by {@link Controller::success()} method.
     * If the flash data does not exist, it will redirect the browser to the homepage.
     */
    public function actionSuccess()
    {
        if (!Yii::app()->user->hasFlash('_success_'))
            $this->redirect(Yii::app()->homeUrl);
        $data = Yii::app()->user->getFlash('_success_');
        $view = $data['_view_'];
        unset($data['_view_']);
        $this->render($view, $data);
    }
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

        if (Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->createUrl('user/login'));
        else
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

                //use yii mailer
                $mail = new YiiMailer('feedback', array('feedback'=>$model,'description' => 'RFM Church Manager - Feedback'));
                //set properties
                $mail->setFrom("churchmanager@rfm.org.za",Yii::app()->user->name);
                $mail->setSubject('=?UTF-8?B?'.base64_encode($model->subject).'?=');
                $mail->setTo(Yii::app()->params['adminEmail']);
                //send
                if ($mail->send()) {
                    Yii::app()->user->setFlash('contact','Thank you for your feedback.');
                } else {
                    Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
                }
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
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
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
}