<?php
/* @var $this MemberController */
/* @var $data Member */
?>

<div class="view">


    <b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
    <?php echo CHtml::encode($data->firstname); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
    <?php echo CHtml::encode($data->lastname); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assemblyname')); ?>:</b>
	<?php echo CHtml::encode($data->assemblyname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('homeaddress')); ?>:</b>
	<?php echo CHtml::encode($data->homeaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

    <?php echo CHtml::ajaxLink(Yii::t('transaction','Pay Tithe'),$this->createUrl('transaction/actionDelete'),array(
        'onclick'=>'$("#titheDialog").dialog("open"); return false;',
        'update'=>'#titheDialog'
    ),array('id'=>'showTitheDialog'));?>
    <div id="titheDialog"></div>
</div>