<?php
/* @var $this LogsheetController */
/* @var $data Logsheet */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('logsheetid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->logsheetid), array('view', 'id'=>$data->logsheetid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eventid')); ?>:</b>
	<?php echo CHtml::encode($data->eventid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memberid')); ?>:</b>
	<?php echo CHtml::encode($data->memberid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timein')); ?>:</b>
	<?php echo CHtml::encode($data->timein); ?>
	<br />


</div>