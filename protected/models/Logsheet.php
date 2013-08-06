<?php

/**
 * This is the model class for table "{{logsheet}}".
 *
 * The followings are the available columns in table '{{logsheet}}':
 * @property string $logsheetid
 * @property string $eventid
 * @property string $memberid
 * @property string $timein
 * @property integer $ispresent
 * @property string $memberfullname
 */
class Logsheet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Logsheet the static model class
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
		return '{{logsheet}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('logsheetid, eventid, memberid', 'required'),
			array('ispresent', 'numerical', 'integerOnly'=>true),
			array('logsheetid, eventid, memberid, memberfullname', 'length', 'max'=>250),
			array('timein', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('logsheetid, eventid, memberid, timein, ispresent, memberfullname', 'safe', 'on'=>'search'),
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
			'logsheetid' => 'Logsheetid',
			'eventid' => 'Eventid',
			'memberid' => 'Memberid',
			'timein' => 'Timein',
			'ispresent' => 'Ispresent',
			'memberfullname' => 'Memberfullname',
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

		$criteria->compare('logsheetid',$this->logsheetid,true);
		$criteria->compare('eventid',$this->eventid,true);
		$criteria->compare('memberid',$this->memberid,true);
		$criteria->compare('timein',$this->timein,true);
		$criteria->compare('ispresent',$this->ispresent);
		$criteria->compare('memberfullname',$this->memberfullname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}