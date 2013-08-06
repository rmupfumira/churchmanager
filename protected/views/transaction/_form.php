<?php
/* @var $this TransactionController */
/* @var $model Transaction */
/* @var $form CActiveForm */
?>

<div class="form">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo "Enter Name"; ?><br>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$member,
    'attribute'=>'firstname',
     'value'=>$member->firstname,
    'source'=>$this->createUrl('transaction/suggestMember'),
    'options'=>array(
    'delay'=>300,
    'minLength'=>1,
    'showAnim'=>'fold',
    'select'=>"js:function(event, ui) {
    $('#memberid').val(ui.item.memberid);
    $('#phone').val(ui.item.phone);
    }"
    ),
    'htmlOptions'=>array(
    'size'=>'40',
    'placeholder'=>'Type a name here'
    ),
    ));

 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transaction-form',
	'enableAjaxValidation'=>true,
)); ?>




	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
        <?php echo $form->hiddenField($member,'memberid',array('id'=>'memberid')); ?>
	</div>-->
    <div class="row">
        <?php echo "Phone Number"; ?><br>
        <?php echo $form->textField($member,'phone',array('size'=>60,'maxlength'=>250,'id'=>'phone')); ?>
        <?php echo $form->error($member,'phone'); ?>
    </div>

    <?php echo $form->hiddenField($member,'memberid',array('size'=>60,'maxlength'=>250,'id'=>'memberid')); ?>
    <?php echo $form->error($member,'memberid'); ?>
    <div class="row">
        <div class="row">
            <?php echo "Amount"; ?><br>
            <?php echo $form->textField($model,'amount',array('size'=>60,'maxlength'=>250,'id'=>'amount')); ?>
            <?php echo $form->error($model,'amount'); ?>
        </div>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
