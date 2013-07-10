<?php
/* @var $this AssemblyController */
/* @var $model Assembly */

$this->breadcrumbs=array(
	'Assemblies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Assembly', 'url'=>array('index')),
	array('label'=>'Create Assembly', 'url'=>array('create')),
	array('label'=>'Update Assembly', 'url'=>array('update', 'id'=>$model->assemblyid)),
	array('label'=>'Delete Assembly', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->assemblyid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Assembly', 'url'=>array('admin')),
);
?>

<h1>View Assembly #<?php echo $model->assemblyid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'assemblyid',
		'name',
		'address',
		'contactphone',
		'status',
	),
)); ?>
