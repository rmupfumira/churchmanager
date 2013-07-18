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
    array('label'=>'Create Member', 'url'=>array('member/create','aid'=>$model->assemblyid)),
);
?>

<h1>View Assembly : <?php echo $model->name; ?></h1>

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
<br/>
<h1><?php echo $model->name; ?> Members</h1>
<?php $this->widget('zii.widgets.CListView',array('dataProvider'=>$memberDataProvider,
'itemView'=>'/member/_view',));?>
