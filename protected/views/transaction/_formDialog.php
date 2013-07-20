<div class="form" id="titheDialogForm">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'tithe-form',
        'enableAjaxValidation'=>true,
    ));
    //I have enableAjaxValidation set to true so i can validate on the fly the
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'transactionid'); ?>
        <?php echo $form->textField($model,'transactionid',array('size'=>60,'maxlength'=>90)); ?>
        <?php echo $form->error($model,'transactionid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'transactiontype'); ?>
        <?php echo $form->textField($model,'transactiontype',array('size'=>60,'maxlength'=>180)); ?>
        <?php echo $form->error($model,'transactiontype'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::ajaxSubmitButton(Yii::t('transaction','Pay Tithe'),CHtml::normalizeUrl(array('transaction/paytithe','render'=>false)),array('success'=>'js: function(data) {
                        $("#Person_jid").append(data);
                        $("#titheDialog").dialog("close");
                    }'),array('id'=>'closeTitheDialog')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>