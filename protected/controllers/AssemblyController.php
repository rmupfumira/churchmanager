<?php

class AssemblyController extends Controller
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
        $memberDataProvider = new CActiveDataProvider('Member',array(
            'criteria'=>array(
            'condition'=>'assemblyid=:assemblyid',
            'params'=>array(':assemblyid'=>$this->loadModel($id)->assemblyid),),
            'pagination'=>array('pageSize'=>2,),
        ));
		$this->render('view',array(
			'model'=>$this->loadModel($id),'memberDataProvider'=>$memberDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Assembly;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Assembly']))
		{

            $model->assemblyid = Utilities::generateAssemblyId();
            $model->status = Constants::STATUS_ACTIVE;
            $model->attributes=$_POST['Assembly'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->assemblyid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Assembly']))
		{
			$model->attributes=$_POST['Assembly'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->assemblyid));
		}

		$this->render('update',array(
			'model'=>$model,
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
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

    public function actionCancel($id){
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Assembly');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Assembly('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Assembly']))
			$model->attributes=$_GET['Assembly'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Assembly the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Assembly::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Assembly $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='assembly-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
