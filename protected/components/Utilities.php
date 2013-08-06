<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Russel
 * Date: 2013/07/19
 * Time: 5:57 AM
 * To change this template use File | Settings | File Templates.
 */
class Utilities {

    public static function generateMemberId($assemblyname){
        $stamp = date("Ymdhis");
        return $assemblyname."-".$stamp;
    }
    public static function generateAccountNumber(){
        return uniqid("ACC",true);
    }
    public static function generateTXNId(){
        return uniqid("TXN",true);
    }
    public static function generateAssemblyId(){
        return uniqid("AS",false);
    }
    public static function generateEventId(){
        return uniqid("EVT",true);
    }
    public static function loadMembers($assemblyid){
        //if the assembly is null return all!
        if($assemblyid === null){
            return CHtml::listData(Member::model()->findAll(),'memberid','firstname','lastname');
        }
        else{//filter by this assembly
            $criteria = new CDbCriteria();
            $criteria->condition = "assemblyid = $assemblyid";
            $members = Member::model()->findAll($criteria);
            return CHtml::listData($members,'memberid','firstname','lastname');
        }
    }
    public static function moneyFormat($amount){
        return number_format($amount,2);
    }
    public static function loadAssemblies($assemblyid){
        //if the assembly is null create it based on input id
        if($assemblyid === null){
            return CHtml::listData(Assembly::model()->findAll(),'assemblyid','name');
        }
        else{
            return  CHtml::listData(Assembly::model()->findAllByPk($assemblyid),'assemblyid','name');
        }
    }
    public static function getStatusTypes(){

        return array(
            Constants::STATUS_ACTIVE=>'Active',
            Constants::STATUS_DEACTIVATED=>'DeActivated',
            Constants::STATUS_PENDING_APPROVAL=>'Pending Approval'
        );
    }
    public static function getUserRoles(){

        return array(
            Constants::ROLE_PASTOR=>'Pastor',
            Constants::ROLE_ADMINISTRATOR=>'Administrator',
            Constants::ROLE_SUPER_USER=>'Super User'
        );
    }
    public static function getAssemblyName($id){
        $model = Assembly::model()->findByPk($id);
        return $model->name;
    }
    public static function getMemberName($id){
        $model = Member::model()->findByPk($id);
        return $model->firstname." ".$model->lastname;
    }
    public static  function getEventTypes(){

        return array(
            Constants::EVENT_SUNDAY_SERVICE=>'Sunday Service',
            Constants::EVENT_CONFERENCE=>'Conference',
            Constants::EVENT_CELL_GROUP=>'Cell Group'
        );
    }
public static function sendSMS($phone, $sms){

    $username = Constants::WINSMS_USERNAME;
    $password = Constants::WINSMS_PASSWORD;
    $message = urlencode($sms);

    $url = "http://www.winsms.co.za/api/batchmessage.asp?user=$username&password=$password&message=$message&Numbers=$phone;";
    $fp = fopen($url, 'r');

    while(!feof($fp)){
        $line = fgets($fp, 4000);
        Yii::log('', CLogger::LEVEL_INFO,$line);
    }
    fclose($fp);
}
}


?>