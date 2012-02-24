<h1>Комментарии</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_item'=>array(
            'name'=>'id_item',
            'value'=>'Item::model()->getItem($data->id_item)',
        ),
		'date_add'=>array(
            'name'=>'date_add',
            'value'=>'Users::model()->getDate($data->date_add)'
        ),
		'name_user',
		'text:text',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

