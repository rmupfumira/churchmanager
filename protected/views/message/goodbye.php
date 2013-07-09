<?php
/* @var $this MessageController */

$this->breadcrumbs=array(
    'Message'=>array('/message'),
    'Hello',
);
?>
<p>
    ToT Siens!!!!     <?php echo CHtml::link('Welcome',array('message/hello')); ?>
</p>