<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    public $user;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));

        if($user===null)
                 $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
                 $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
            {
                $this->_id=$user->username;
                $this->username=$user->username;
                //set isAdmin now
                if ( $user->superuser == 1)
                {
                    yii::app()->user->setState("isAdminUser",true);
                } else {
                    yii::app()->user->setState("isAdminUser",false);
                }

                $this->setState('lastlogin', date("m/d/y g:i A", strtotime($user->lastlogin)));
                $user->saveAttributes(array(
                    'lastlogin'=>date("Y-m-d H:i:s", time()),
                        ));
                $this->errorCode=self::ERROR_NONE;
                $this->setUser($user);
            }
        return $this->errorCode==self::ERROR_NONE;
        }

    public function getId()
    {
        return $this->_id;
    }

    public function getUser(){
        return $this->user;
    }
    public function setUser(CActiveRecord $user){
        $this->user = $user->attributes;
    }


}