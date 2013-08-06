<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'eventtype'); ?>
		<?php echo CHtml::activeDropDownList($model,'eventtype',$eventtypes); ?>
		<?php echo $form->error($model,'eventtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eventdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'model'=>$model,
            'attribute'=>'eventdate',
             // additional javascript options for the date picker plugin
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'dd-mm-yy',
                'jqueryOption'=>'jqueryOptionValue',
            ),
            'htmlOptions'=>array(
                'style'=>'height:20px;'
            ),
        )); ?>
		<?php echo $form->error($model,'eventdate'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'assemblyid'); ?>
		<?php echo CHtml::activeDropDownList($model,'assemblyid',$assemblies); ?>
		<?php echo $form->error($model,'assemblyid'); ?>
	</div>


	<div class="row">
		<b><?php echo "Total Tithes Collected"; ?></b><br>
        <?php echo $form->textField($model,'totaltithes'); ?>
		<?php echo $form->error($model,'totaltithes'); ?>
	</div>

	<div class="row">
		<b><?php echo "Total Offerings Collected"; ?></b><br>
        <?php echo $form->textField($model,'totalofferings'); ?>
		<?php echo $form->error($model,'totalofferings'); ?>
	</div>

	<div class="row">
		<b><?php echo "Conference Contribution"; ?></b><br>
        <?php echo $form->textField($model,'conference'); ?>
		<?php echo $form->error($model,'conference'); ?>
	</div>

	<div class="row">
		<b><?php echo "Attendance"; ?></b><br>
		<?php echo $form->textField($model,'attendance'); ?>
		<?php echo $form->error($model,'attendance'); ?>
	</div>

	<div class="row">
		<b><?php echo "Leader's Comment"; ?></b><br>
		<?php echo $form->textArea($model,'comment',array('size'=>100,'maxlength'=>800)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->