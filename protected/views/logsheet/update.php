<?php
/* @var $this LogsheetController */
/* @var $model Logsheet */

$this->breadcrumbs=array(
	'Logsheets'=>array('index'),
	$model->logsheetid=>array('view','id'=>$model->logsheetid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Logsheet', 'url'=>array('index')),
	array('label'=>'Create Logsheet', 'url'=>array('create')),
	array('label'=>'View Logsheet', 'url'=>array('view', 'id'=>$model->logsheetid)),
	array('label'=>'Manage Logsheet', 'url'=>array('admin')),
);
?>

<h1>Update Logsheet <?php echo $model->logsheetid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>