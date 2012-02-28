<h1>Обратный звонок</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'back-phone-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'phone',
		'date_add'=>array(
            'name'=>'date_add',
            'value'=>'Users::model()->getDate($data->date_add)'
        ),
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
