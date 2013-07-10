<?php
/* @var $this AssemblyController */
/* @var $model Assembly */

$this->breadcrumbs=array(
	'Assemblies'=>array('index'),
	$model->name=>array('view','id'=>$model->assemblyid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Assembly', 'url'=>array('index')),
	array('label'=>'Create Assembly', 'url'=>array('create')),
	array('label'=>'View Assembly', 'url'=>array('view', 'id'=>$model->assemblyid)),
	array('label'=>'Manage Assembly', 'url'=>array('admin')),
);
?>

<h1>Update Assembly <?php echo $model->assemblyid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>