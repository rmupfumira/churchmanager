<?php
/* @var $this AssemblyController */
/* @var $data Assembly */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('assemblyid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->assemblyid), array('view', 'id'=>$data->assemblyid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contactphone')); ?>:</b>
	<?php echo CHtml::encode($data->contactphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>