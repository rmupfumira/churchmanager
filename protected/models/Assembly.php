<?php

/**
 * This is the model class for table "{{assembly}}".
 *
 * The followings are the available columns in table '{{assembly}}':
 * @property string $assemblyid
 * @property string $name
 * @property string $address
 * @property string $contactphone
 * @property string $status
 */
class Assembly extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Assembly the static model class
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
		return '{{assembly}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('assemblyid', 'required'),
			array('assemblyid, name, contactphone, status', 'length', 'max'=>250),
			array('address', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('assemblyid, name, address, contactphone, status', 'safe', 'on'=>'search'),
            array('status','in','range'=>Utilities::getStatusTypes())
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
            'members'=> array(self::HAS_MANY, 'Member','assemblyid'),
            'users' => array(self::HAS_MANY, 'User','assemblyid')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'assemblyid' => 'Assemblyid',
			'name' => 'Name',
			'address' => 'Address',
			'contactphone' => 'Contactphone',
			'status' => 'Status',
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

		$criteria->compare('assemblyid',$this->assemblyid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contactphone',$this->contactphone,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}