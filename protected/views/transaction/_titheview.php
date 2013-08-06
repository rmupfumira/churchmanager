<?php
/* @var $this TransactionController */
/* @var $data Transaction */
?>

<div class="view">

    <b><?php echo "Name"; ?>:</b>
    <?php echo CHtml::link(CHtml::encode($member->getFullname()), array('member/view', 'id'=>$member->memberid)); ?>
    <br />

    <b><?php echo"Phone"; ?>:</b>
    <?php echo CHtml::encode($member->phone); ?>
    <br />

    <b><?php echo "Email"; ?>:</b>
    <?php echo CHtml::encode($member->email); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
    <?php echo CHtml::encode($data->amount); ?>
    <br />


</div>