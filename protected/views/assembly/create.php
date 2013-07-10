<?php
/* @var $this AssemblyController */
/* @var $model Assembly */

$this->breadcrumbs=array(
	'Assemblies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Assembly', 'url'=>array('index')),
	array('label'=>'Manage Assembly', 'url'=>array('admin')),
);
?>

<h1>Create Assembly</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>