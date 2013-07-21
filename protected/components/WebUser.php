<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

    // Store model to not repeat query.
    private $_model;
    public $lastlogin;
    public $firstname;

    // Return first name.
    // access it by Yii::app()->user->first_name
    function getFirst_Name(){
        $user = $this->loadUser(Yii::app()->user->id);
        if($user != null)
        return $user->username;
            return $user = User::model();
    }

    function getLastLogin(){
        return $this->lastlogin;
    }

    // This is a function that checks the field 'role'
    // in the User model to be equal to 1, that means it's admin
    // access it by Yii::app()->user->isAdmin()
  /*  function isAdmin(){
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->role) == 1;
    }*/

    // Load user model.
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}
?>