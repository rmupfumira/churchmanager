<?php
/* @var $this MessageController */

$this->breadcrumbs=array(
	'Message'=>array('/message'),
	'Hello',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	Its good to be back!!!! <?php echo $time ?>
    <?php echo CHtml::link('Goodbye',array('message/goodbye')); ?>
</p>
