<?php

class EventController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}



	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
    {
        $model=new Event;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['Event']))
        {
            $model->attributes=$_POST['Event'];
            $model->eventid = Utilities::generateEventId();
            $model->status = Constants::STATUS_NEW; //TODO : need to add intelligence on the status depending on date
            $model->eventdate = date('Y-m-d', strtotime($model->eventdate));
            Yii::log('',CLogger::LEVEL_INFO,print_r($_POST));
            if($model->save()){
                //now lets send emails
                $assembly = Assembly::model()->findByPk($model->assemblyid);
                $mail = new YiiMailer('event_report', array('event'=>$model,'assembly' => $model->assembly->name, 'description' => 'RFM Church Manager'));
                //set properties
                $mail->setFrom("churchmanager@rfm.org.za",Yii::app()->name);
                $mail->setSubject($model->eventtype." Report");
                $mail->setTo($assembly->contactemail);
                //send
                if ($mail->send()) {
                    Yii::app()->user->setFlash('success','Event created successfully and notification email has been sent.');
                } else {
                    Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
                }

                $this->redirect(array('view','id'=>$model->eventid));
            }

        }

        $aid = null;
        if(isset($_GET['aid']))
            $aid = $_GET['aid'];
        $this->render('create',array('model'=>$model,'assemblies'=>Utilities::loadAssemblies($aid),'eventtypes'=>Utilities::getEventTypes()));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Event']))
		{
			$model->attributes=$_POST['Event'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->eventid));
		}

        $this->render('create',array('model'=>$model,'assemblies'=>Utilities::loadAssemblies($model->assemblyid),'eventtypes'=>Utilities::getEventTypes()));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Event');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
        $this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Event('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Event']))
			$model->attributes=$_GET['Event'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Event the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Event::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Event $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='event-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
