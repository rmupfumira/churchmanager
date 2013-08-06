<?php


class MemberController extends Controller
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
        //$assemblyname =$this->loadModel($id)->getAssemblyName();
		$this->render('view',array(
			'model'=>$this->loadModel($id)
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Member;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
            $model->memberid = Utilities::generateMemberId($model->getAssemblyName());
            $model->status = Constants::STATUS_ACTIVE;
            $account = new Account();
            $account->owner = $model->memberid;
            $account->status = Constants::STATUS_ACTIVE;
            $account->accountid = Utilities::generateAccountNumber();
            $account->accounttype = Constants::ACCOUNT_TYPE_MEMBER;
            if($account->save()){
                if($model->save()){
                    Yii::app()->user->setFlash('success', 'Member created succesfully');
                    $this->redirect(array('view','id'=>$model->memberid));
                }
            }


		}
        $aid = null;
        if(isset($_GET['aid']))
        $aid = $_GET['aid'];
		$this->render('create',array('model'=>$model,'assemblies'=>Utilities::loadAssemblies($aid)));
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

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
			if($model->save()){
                Yii::app()->user->setFlash('success', 'Member updated succesfully');
                $this->redirect(array('view','id'=>$model->memberid));
            }

		}
        $aid = $model->assemblyid;
		$this->render('update',array('model'=>$model,'assemblies'=>Utilities::loadAssemblies($aid)));
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
		/*$dataProvider=new CActiveDataProvider('Member');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));  */
       $this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Member('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Member']))
			$model->attributes=$_GET['Member'];

		$this->render('admin',array(
			'model'=>$model,
		));

	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Member the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Member::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Member $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='member-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    protected function actionPaytithe($id){

        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Member']))
        {
            $model->attributes=$_POST['Member'];
            if($model->save()){
                Yii::app()->user->setFlash('success', 'Tithe payment succesfully loaded');
                $this->redirect(array('view','id'=>$model->memberid));
            }

        }

        $this->render('paytithe',array('model'=>$model));
    }

    /*public function filterAssemblyContext($filterChain){

        if(isset($_GET['aid'])){
            $this->loadAssembly($_GET['aid']);
        }

         $filterChain->run();
    }*/
}
