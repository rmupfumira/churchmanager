<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */


$this->breadcrumbs=array(
    'Members'=>array('index'),
    'Pay Tithe',
);

$this->menu=array(
    array('label'=>'List Member', 'url'=>array('index')),
    array('label'=>'Manage Member', 'url'=>array('admin')),
);
?>

    <h1>Pay tithe</h1>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'tithe-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'amount'); ?>
        <?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>250)); ?>
        <?php echo $form->error($model,'firstname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'lastname'); ?>
        <?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>250)); ?>
        <?php echo $form->error($model,'lastname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'gender'); ?>
        <?php echo $form->dropDownList($model,'gender',array('Male'=>'Male','Female'=>'Female')); ?>
        <?php echo $form->error($model,'gender'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'phone'); ?>
        <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>250)); ?>
        <?php echo $form->error($model,'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>250)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'homeaddress'); ?>
        <?php echo $form->textField($model,'homeaddress',array('size'=>60,'maxlength'=>500)); ?>
        <?php echo $form->error($model,'homeaddress'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->