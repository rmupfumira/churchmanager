<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'eventid'); ?>
		<?php echo $form->textField($model,'eventid',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eventtype'); ?>
		<?php echo $form->textField($model,'eventtype',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eventdate'); ?>
		<?php echo $form->textField($model,'eventdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assemblyid'); ?>
		<?php echo $form->textField($model,'assemblyid',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'starttime'); ?>
		<?php echo $form->textField($model,'starttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endtime'); ?>
		<?php echo $form->textField($model,'endtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totaltithes'); ?>
		<?php echo $form->textField($model,'totaltithes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totalofferings'); ?>
		<?php echo $form->textField($model,'totalofferings'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conference'); ?>
		<?php echo $form->textField($model,'conference'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attendance'); ?>
		<?php echo $form->textField($model,'attendance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->