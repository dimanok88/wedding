<?php
$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
);
?>

<h1>Тип контента</h1>

<p>
Вы можете использовать следующие операторы для поиска (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>)
</p>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'type-item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		array(
			'header'=>'Действия',
			'class'=>'CButtonColumn',
            'template' => '{update} {delete}',
		),
	),
)); ?>
