<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->firstname." ".$model->lastname,
);

$this->menu=array(
	array('label'=>'List Member', 'url'=>array('index')),
	array('label'=>'Create Member', 'url'=>array('create')),
	array('label'=>'Update Member', 'url'=>array('update', 'id'=>$model->memberid)),
	array('label'=>'Delete Member', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->memberid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Member', 'url'=>array('admin')),
);
?>

<h1>View Member : <?php echo $model->fullname(); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'firstname',
        'lastname',
        array(            // display 'assembly.name' using an expression
            'label'=>'Assembly',
            'value'=>$model->assembly->name,
        ),
		'gender',
		'phone',
		'email',
		'homeaddress',
		'status',

	),
)); ?>
<?php  $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mymodal',
    'options'=>array(
        'title'=>'Enter Tithe',
        'width'=>400,
        'height'=>300,
        'autoOpen'=>false,
        'resizable'=>false,
        'modal'=>true,
        'overlay'=>array(
            'backgroundColor'=>'#000',
            'opacity'=>'0.5'
        ),),))

?>
<?php echo $this->renderPartial('_entertithe', array('model'=>$model)); ?>



<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
