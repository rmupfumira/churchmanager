<?php
/* @var $this LogsheetController */
/* @var $model Logsheet */

$this->breadcrumbs=array(
	'Logsheets'=>array('index'),
	$model->logsheetid,
);

$this->menu=array(
	array('label'=>'List Logsheet', 'url'=>array('index')),
	array('label'=>'Create Logsheet', 'url'=>array('create')),
	array('label'=>'Update Logsheet', 'url'=>array('update', 'id'=>$model->logsheetid)),
	array('label'=>'Delete Logsheet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->logsheetid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Logsheet', 'url'=>array('admin')),
);
?>

<h1>View Logsheet #<?php echo $model->logsheetid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'logsheetid',
		'eventid',
		'memberid',
		'timein',
	),
)); ?>
