<?php
/* @var $this LogsheetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Logsheets',
);

$this->menu=array(
	array('label'=>'Create Logsheet', 'url'=>array('create')),
	array('label'=>'Manage Logsheet', 'url'=>array('admin')),
);
?>

<h1>Logsheets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
