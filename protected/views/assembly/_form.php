<?php
/* @var $this AssemblyController */
/* @var $model Assembly */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assembly-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactphone'); ?>
		<?php echo $form->textField($model,'contactphone',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'contactphone'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'contactemail'); ?>
        <?php echo $form->textField($model,'contactemail',array('size'=>60,'maxlength'=>250)); ?>
        <?php echo $form->error($model,'contactemail'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::htmlButton('Cancel'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->