<?php
/* @var $this LogsheetController */
/* @var $model Logsheet */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'enableAjaxValidation'=>true,
    )); ?>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'menu-grid',
        'dataProvider'=>$model->search(),

        'columns'=>array(
            array(
                'id'=>'autoId',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => '50',
            ),

            'memberfullname',

            array(
                'name'=>'ispresent',
                'header'=>'Present',
                'filter'=>array('1'=>'Yes','0'=>'No'),
                'value'=>'($data->ispresent=="1")?("Yes"):("No")'
            ),
            array(
                'class'=>'CButtonColumn',
            ),
        ),
    )); ?>
    <script>
        function reloadGrid(data) {
            $.fn.yiiGridView.update('menu-grid');
        }
    </script>
    <?php echo CHtml::ajaxSubmitButton('Filter',array('logsheet/markregister'), array(),array("style"=>"display:none;")); ?>
    <?php echo CHtml::ajaxSubmitButton('Mark Selected as Present',array('logsheet/markregister','act'=>'doPresent'), array('success'=>'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Mark Selected as Absent',array('logsheet/markregister','act'=>'doAbsent'), array('success'=>'reloadGrid')); ?>

    <?php $this->endWidget(); ?>


</div><!-- form -->