<h1>Пользователи</h1>

<p>
Вы можете использовать следующие операторы для поиска (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>)
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'fast_name',
		'phone',
		'email',
		'date_reg'=>array(
            'name'=>'date_reg',
            'value'=>'Users::model()->getDate($data->date_reg)'
        ),
		array(
            'header'=>'Действия',
			'class'=>'CButtonColumn',
            'template' => '{update} {delete}',
		),
	),
)); ?>
