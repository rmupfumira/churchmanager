<?php
/* @var $this LogsheetController */
/* @var $model Logsheet */

$this->breadcrumbs=array(
	'Logsheets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Logsheet', 'url'=>array('index')),
	array('label'=>'Manage Logsheet', 'url'=>array('admin')),
);
?>

<h1>Create Logsheet</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>