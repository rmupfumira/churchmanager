<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
        'name'=>'city',
        'source'=>array('ac1','ac2','ac3'),
        // additional javascript options for the autocomplete plugin
        'options'=>array(
            'minLength'=>'2',
        ),
        'htmlOptions'=>array(
            'style'=>'height:20px;',
        ),
    ));
    ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'Member'); ?>
        <?php echo $form->textField($model,'memberid',array('size'=>60,'maxlength'=>250)); ?>
        <?php echo $form->error($model,'memberid'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Role'); ?>
		<?php echo $form->dropDownList($model,"role",$model->getRoles()) ?>
		<?php echo $form->error($model,'role'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->