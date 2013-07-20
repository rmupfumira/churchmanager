<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'titheDialog',
    'options'=>array(
        'title'=>Yii::t('transaction','Pay Tithe'),
        'autoOpen'=>true,
        'modal'=>'true',
        'width'=>'auto',
        'height'=>'auto',
    ),
));
echo "this is it!!";
echo $this->renderPartial('_formDialog', array('model'=>$model)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>