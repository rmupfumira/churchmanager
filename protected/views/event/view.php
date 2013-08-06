<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
  $model->assembly->name.' '.$model->eventtype.' '.$model->eventdate,
);

$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->eventid)),
	array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eventid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
?>

<h1>View Event</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eventtype',
		'eventdate',
        array(            // display 'assembly.name' using an expression
            'label'=>'Assembly',
            'value'=>$model->assembly->name,
        ),
		'totaltithes',
		'totalofferings',
		'conference',
		'attendance',
		'comment',
	),
)); ?>
