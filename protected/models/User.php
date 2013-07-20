<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $username
 * @property string $lastlogin
 * @property string $password
 * @property string $status
 * @property string $role
 * @property string $assemblyid
 * @property string $memberid
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, memberid', 'required'),
            array('username','required'),
            array('username','unique'),
			array('username, password, status, role, assemblyid, memberid', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, lastlogin, password, status, role, assemblyid, memberid', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'lastlogin' => 'Lastlogin',
			'password' => 'Password',
			'status' => 'Status',
			'role' => 'Role',
			'assemblyid' => 'Assemblyid',
			'memberid' => 'Memberid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('username',$this->username,true);
		$criteria->compare('lastlogin',$this->lastlogin,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('assemblyid',$this->assemblyid,true);
		$criteria->compare('memberid',$this->memberid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function getMemberName(){
        return Utilities::getMemberName($this->memberid);
    }
    public function getAssemblyName(){
        return Utilities::getAssemblyName($this->assemblyid);
    }
    public function getRoles(){
        return Utilities::getUserRoles();
    }
    protected function afterValidate()
    {
        parent::afterValidate();
        if(!$this->hasErrors())
            $this->password = $this->hashPassword($this->password);
    }
    /**
     * Generates the password hash.
     * @param string password
     * @return string hash
     */
    public function hashPassword($password)
    {
        return md5($password);
    }
}