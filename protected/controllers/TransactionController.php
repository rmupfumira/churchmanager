<?php

class TransactionController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
        $this->render('admin', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Transaction();
        $member = new Member();

        if (isset($_POST['Member'])) {
            $member->attributes = $_POST['Member'];
            $account = $member->getAccount();
            $model->transactionid = Utilities::generateTXNId();
            $model->attributes = $_POST['Transaction'];
            date_default_timezone_set('Africa/Nairobi');
            $model->time = date_format((new DateTime()),'Y-m-d') ;
            $model->transactiontype = Constants::TXN_TYPE_DEBIT;
            $model->accountid = $account->accountid;
            if ($model->save()) {
                //now send notifications:
                //send sms
                $smsmsg = "Revival Fire Ministries : Your tithe payment of R" . number_format($model->amount, 2) . " made on " .date_format((new DateTime()),'Y-m-d'). " has been received.Thank you!For more info visit www.rfm.org.za.";
                $member->sendMeSMS($smsmsg);
                Yii::app()->user->setFlash('success', 'Tithe payment entered succesfully');
                $this->refresh();
            }

        } else {
            $this->render('create', array('model' => $model, 'member' => $member));
        }

    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    /*public function actionCreate()
    {
        $model=new Transaction;
        $member= new Member();
        Yii::log('', CLogger::LEVEL_ERROR, 'Now in the action method...but outside the if');
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['Transaction']) && isset($_POST['Member']))
        {
            Yii::log('', CLogger::LEVEL_ERROR, 'Now in the action method...POST');
            $member->attributes=$_POST['Member'];
            $account = $member->getAccount();
           // Yii::log('', CLogger::LEVEL_ERROR, print_r($_POST));
           // $account = Account::model()->find('owner =:owner',array(':owner'=>$member->memberid));
            $model->attributes=$_POST['Transaction'];
            $model->transactionid = Utilities::generateTXNId();
            date_default_timezone_set('Africa/Nairobi');
            $model->time = (new DateTime())->format('Y-m-d');
            $model->transactiontype = Constants::TXN_TYPE_DEBIT;
            $model->accountid = $account->accountid;
            if($model->save())
                //now send notifications:
                //send sms
            $smsmsg ="Revival Fire Ministries : Your tithe payment of R".number_format($model->amount,2)." made on ".(new DateTime())->format('Y-m-d')." has been received.Thank you!For more info visit www.rfm.org.za.";
            $member->sendMeSMS($smsmsg);
                Yii::app()->user->setFlash('success', 'Tithe payment entered succesfully');
                 $this->render('view',array(
                'model'=>$model,'member'=>$member
            ));
        }else{
            Yii::log('', CLogger::LEVEL_ERROR, 'Now in the action method....but mu else...');
            $this->render('create',array(
                'model'=>$model,'member'=>$member
            ));
        }


    }*/
    public function actionSuggestMember(){
        if(isset($_GET['term'])&&($keyword=trim($_GET['term']))!==''){
            $model = new Member();
            $suggest = $model->suggestMember($keyword,20);
            echo CJSON::encode($suggest);
        }

    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Transaction'])) {
            $model->attributes = $_POST['Transaction'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->transactionid));
        }

        $this->render('update', array(
            'model' => $model,
        ));
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
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Transaction');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Transaction('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Transaction']))
            $model->attributes = $_GET['Transaction'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Transaction the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Transaction::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Transaction $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'transaction-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
