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
			array('firstname,phone', 'required'),
            array('email', 'email'),
            array('email','unique'),
            array('phone','unique'),
			array('memberid, assemblyid, firstname, lastname, gender, phone, email, status', 'length', 'max'=>250),
			array('homeaddress', 'length', 'max'=>500),
			array('datecreated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('memberid, assemblyid, firstname, lastname, gender, phone, email, homeaddress, status', 'safe', 'on'=>'search'),
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
            'assembly'=>array(self::BELONGS_TO, 'Assembly','assemblyid')
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
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'gender' => 'Gender',
			'phone' => 'Phone',
			'email' => 'Email',
			'homeaddress' => 'Home Address',
			'status' => 'Status',
			'datecreated' => 'Date Created',
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
    public function getAssemblyName(){
        $id = $this->assemblyid;
        $model = Assembly::model()->findByPk($id);
        return $model->name;
    }
    public function getAccount(){
        $account = Account::model()->find('owner =:ownerid',array(':ownerid'=>$this->memberid));
        return $account;
    }
    public function fullname(){
        return $this->firstname." ".$this->lastname;
    }

    /** Creates a suggest query to be used for ajax autocomplete e.t.c
     * @param $keyword
     * @param int $limit
     */
    public function suggestMember($keyword, $limit=20){

        $models = Member::model()->findAll(array("condition"=>"firstname like '$keyword%'"));
        $suggest = array();
        foreach($models as $model){
            $suggest[] = array(
                'label' => $model->fullname().' - '.$model->phone,
                'value' => $model->fullname(),
                'memberid'=>$model->memberid,
                'phone'=>$model->phone,
            );
        }
        return $suggest;
    }
    public function sendMeSMS($msg){
           Utilities::sendSMS($this->phone,$msg);
    }
    public function sendMeEmail($email){

    }

}