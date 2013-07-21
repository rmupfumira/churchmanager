<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Hi <i></i></h1>

<p>Welcome <?php Yii::app()->user->getFirst_Name(); ?> !</p>
<p>
    You last logged in on  : <?php Yii::app()->user->getLastLogin(); ?> <br>
<i>if this information is incorrect, please contact the IT Administrator immediately</i>
</p>

