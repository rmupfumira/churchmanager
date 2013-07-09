<?php

/**
 * This is the model class for table "{{member}}".
 *
 * The followings are the available columns in table '{{member}}':
 * @property string $memberid
 * @property string $assemblyid
 * @property string $firstname
 * @property string $lastname
 * @property string $gender
 * @property string $phone
 * @property string $email
 * @property string $homeaddress
 * @property string $status
 * @property string $datecreated
 */
class Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
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
		return '{{member}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstname,email,phone', 'required'),
            array('email', 'email'),
			array('memberid, assemblyid, firstname, lastname, gender, phone, email, status', 'length', 'max'=>250),
			array('homeaddress', 'length', 'max'=>500),
			array('datecreated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('memberid, assemblyid, firstname, lastname, gender, phone, email, homeaddress, status, datecreated', 'safe', 'on'=>'search'),
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
			'memberid' => 'Memberid',
			'assemblyid' => 'Assemblyid',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'gender' => 'Gender',
			'phone' => 'Phone',
			'email' => 'Email',
			'homeaddress' => 'Homeaddress',
			'status' => 'Status',
			'datecreated' => 'Datecreated',
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

		$criteria->compare('memberid',$this->memberid,true);
		$criteria->compare('assemblyid',$this->assemblyid,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('homeaddress',$this->homeaddress,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('datecreated',$this->datecreated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}