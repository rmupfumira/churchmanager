<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view">



	<b><?php echo CHtml::encode($data->getAttributeLabel('eventtype')); ?>:</b>
	<?php echo CHtml::encode($data->eventtype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eventdate')); ?>:</b>
	<?php echo CHtml::encode($data->eventdate); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('assemblyid')); ?>:</b>
	<?php echo CHtml::encode($data->assembly->name); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('totaltithes')); ?>:</b>
	<?php echo CHtml::encode($data->totaltithes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('totalofferings')); ?>:</b>
	<?php echo CHtml::encode($data->totalofferings); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conference')); ?>:</b>
	<?php echo CHtml::encode($data->conference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attendance')); ?>:</b>
	<?php echo CHtml::encode($data->attendance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	*/ ?>

</div>