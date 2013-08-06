<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'tithe-form',
        'enableAjaxValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>TRUE),

    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <div id="AjaxLoader" style="display: none"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/spinner.jpg"></img></div>
    <div class="row">
        <?php echo $form->labelEx($model,'Date of payment'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'attribute'=>'transactiondate',
            'name'=>'transactiondate',
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
        <?php echo ""; ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'amount'); ?>
        <?php $this->widget("FormatCurrency",
            array(
                "name" => "amount",
            )); ?>
        <?php echo $form->error($model,'amount'); ?>
    </div>

    <?php echo CHtml::ajaxSubmitButton( 'Enter',
        CHtml::normalizeUrl(array('transaction/create')),array(
                        'type'=>'POST',
                        'dataType'=>'json',
                         'success'=>'js:function(data){
                      if(data.result=== "success"){
                      $("#AjaxLoader").show();
                         // do something on success, like redirect
                     }else{
                         $("#eventlist").html(data);
                        }
                      }',
                    ));
    ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->