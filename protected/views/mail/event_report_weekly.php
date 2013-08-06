<?php
/* @var $this EventController */
/* @var $model Event */

?>

<h1>Sunday Service Weekly Report</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'event-grid',
    'dataProvider'=>$model->searchLatest(),

    'columns'=>array(
        'eventdate',
        array(            // display 'assembly.name' using an expression
            'name'=>'assembly',
            'value'=>'$data->assembly->name',
        ),
        'totalofferings',
        'conference',
        'attendance',
        'comment',

    ),
)); ?>

