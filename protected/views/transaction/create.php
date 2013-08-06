<?php
/* @var $this TransactionController */
/* @var $model Transaction */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Transaction', 'url'=>array('index')),
	array('label'=>'Manage Transaction', 'url'=>array('admin')),

);
?>

<h1>Enter Tithe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'member'=>$member)); ?>