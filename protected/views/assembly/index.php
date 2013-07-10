<?php
/* @var $this AssemblyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Assemblies',
);

$this->menu=array(
	array('label'=>'Create Assembly', 'url'=>array('create')),
	array('label'=>'Manage Assembly', 'url'=>array('admin')),
);
?>

<h1>Assemblies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
