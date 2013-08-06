<?php
/* @var $this TransactionController */
/* @var $data Transaction */
?>

<div class="view">



	<b><?php echo "Email"; ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />


</div>