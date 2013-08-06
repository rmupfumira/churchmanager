<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Hi <?php  echo Yii::app()->user->name ?><i></i></h1>


<p>Welcome to Church Manager!</p>
<!--<p>Last Login date : <i><?php /*echo Yii::app()->user->state('lastlogin'); */?></i>-->

<h2>QUICK LINKS</h2>

<ul>
    <li><?php echo CHtml::link('Add new members to database',array('/member/create')) ?></li>
    <li><?php echo CHtml::link('Pay Tithes',array('/transaction/create')) ?></li>
    <li><?php echo CHtml::link('Create a new Sunday Service Report',array('/event/create')) ?></li>
    <li><?php echo CHtml::link('Search Member Database',array('/event/create')) ?></li>
    <li><?php echo CHtml::link('Change your password',array('user/profile/changepassword')) ?></li>
    <li><?php echo CHtml::link('Feedback',array('/site/contact')) ?></li>
</ul>
</p>

