<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {

        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view'),
                'controllers'=>array('cron','site','transaction','member','assembly','user','event','logsheet'),
                'users'=>array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'controllers'=>array('cron','site','transaction','member','assembly','user','event','logsheet'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'controllers'=>array('cron','member','transaction','assembly','user','event','logsheet'),
                'users'=>array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('cron','markregister','suggestMember'), // ALLOW AJAXUPDATE TO REGISTERED USERS
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'controllers'=>array('cron','site','member','assembly','user','event','logsheet','transaction','account'),
                'users'=>array('*'),
            ),
        );
    }
    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }
    public function allowedActions()
    {
        return 'index, login,logout,create';
    }
}