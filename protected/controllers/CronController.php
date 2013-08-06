<?php

class CronController extends Controller
{

    /**
     * Default action
     */
    public function actionIndex()
    {
      //no default method required - every cron has to have a specific method
        $this->actionSendEmail();
    }
    /*
     * Send an event report email to Apostolic team
     */
    public function actionSendWeeklyEventsEmail(){
        //just make sure its coming from the local server
       /* if ($_SERVER['SERVER_ADDR'] != '127.0.0.1')
            throw new CHttpException(403,'Access denied.');*/
        //Now we can safely proceed
        $reports = array();
        $assemblies = Assembly::model()->findAll();
        $lastSunday = date('Y-m-d', strtotime('last Sunday'));
        $reports[] = Event::model()->findAll();
        foreach($assemblies as $assembly){
         $criteria = new CDbCriteria();
        // $criteria->addCondition("assemblyid = '$assembly->assemblyid'");
        // $criteria->addCondition('eventdate ='.$lastSunday);

        }
        $list = new CArrayDataProvider($reports,array('keyField'=>false,'keys'=>array('eventtype', 'eventdate'),));
        $mail = new YiiMailer('event_report_weekly', array('model'=>$reports,'description' => 'RFM Church Manager weekly report'));
        //set properties
        $mail->setFrom("churchmanager@rfm.org.za",Yii::app()->name);
        $mail->setSubject("Assemblies Weekly Report Summary");
        $mail->setTo("apostolic@rfm.org.za");
        //send
        if ($mail->send()) {
            Yii::app()->user->setFlash('success','Cron job has run succesfully.');
        } else {
            Yii::app()->user->setFlash('error','Error while running cron job: '.$mail->getError());
        }
    }
    public function actionSendEmail(){
        $model=new Event('searchLatest');

        $mail = new YiiMailer('event_report_weekly', array('model'=>$model,'description' => 'RFM Church Manager weekly report'));
        //set properties
        $mail->setFrom("churchmanager@rfm.org.za",Yii::app()->name);
        $mail->setSubject("Assemblies Weekly Report Summary");
        $mail->setTo("apostolic@rfm.org.za");
        //send
        if ($mail->send()) {
            Yii::app()->user->setFlash('success','Cron job has run succesfully.');
        } else {
            Yii::app()->user->setFlash('error','Error while running cron job: '.$mail->getError());
        }
    }

    // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}