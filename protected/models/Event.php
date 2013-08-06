<?php

/**
 * This is the model class for table "{{event}}".
 *
 * The followings are the available columns in table '{{event}}':
 * @property string $eventid
 * @property string $eventtype
 * @property DateTime $eventdate
 * @property string $status
 * @property string $assemblyid
 * @property string $starttime
 * @property string $endtime
 * @property double $totaltithes
 * @property double $totalofferings
 * @property double $conference
 * @property integer $attendance
 * @property string $comment
 */
class Event extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Event the static model class
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
		return '{{event}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attendance,totaltithes,totalofferings,comment,eventdate', 'required'),
			array('attendance', 'numerical', 'integerOnly'=>true),
            array('totaltithes,totalofferings,conference', 'type', 'type'=>'float','message'=>'Please enter the {attribute} amount properly (For cents use .(dot) instead of , (comma))'),
			array('eventid, eventtype, status, assemblyid', 'length', 'max'=>250),
			array('comment', 'length', 'max'=>500),
			array('eventdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('eventid, eventtype, eventdate, status, assemblyid, starttime, endtime, totaltithes, totalofferings, conference, attendance, comment', 'safe', 'on'=>'search'),
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
            'assembly'=>array(self::BELONGS_TO ,'Assembly','assemblyid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'eventid' => 'Event id',
			'eventtype' => 'Event type',
			'eventdate' => 'Event date',
			'status' => 'Status',
			'assemblyid' => 'Assembly',
			'starttime' => 'Start time',
			'endtime' => 'End time',
			'totaltithes' => 'Total tithes',
			'totalofferings' => 'Total offerings',
			'conference' => 'Conference',
			'attendance' => 'Attendance',
			'comment' => 'Comment',
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

		$criteria->compare('eventid',$this->eventid,true);
		$criteria->compare('eventtype',$this->eventtype,true);
		$criteria->compare('eventdate',$this->eventdate,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('assemblyid',$this->assemblyid,true);
		$criteria->compare('starttime',$this->starttime,true);
		$criteria->compare('endtime',$this->endtime,true);
		$criteria->compare('totaltithes',$this->totaltithes);
		$criteria->compare('totalofferings',$this->totalofferings);
		$criteria->compare('conference',$this->conference);
		$criteria->compare('attendance',$this->attendance);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function searchLatest()
    {
        $assemblies = Assembly::model()->findAll();
        $lastSunday = date('Y-m-d', strtotime('last Sunday'));
        $reports = array();
        //$lastSunday = date('Y-m-d', strtotime('last Sunday'));
        foreach($assemblies as $assembly){
            $criteria = new CDbCriteria();
            $criteria->addCondition("assemblyid = '$assembly->assemblyid'");
            //$criteria->compare('eventdate',$lastSunday,true);
            //$criteria->addCondition('eventdate ='.$lastSunday);
            $criteria->order = 'eventdate DESC';
           $reports[] = Event::model()->find($criteria);
        }

       return $list = new CArrayDataProvider($reports,array('keyField'=>false,'keys'=>array('eventtype', 'eventdate'),));

        /*return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));*/
    }
    public function getAssemblyName(){
        $id = $this->assemblyid;
        $model = Assembly::model()->findByPk($id);
        return $model->name;
    }
}