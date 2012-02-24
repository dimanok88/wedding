<?php

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('update')),
);
?>

<h1>Настройки</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'options-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'sys_name',
		'description',
		array(
            'header'=>'Действия',
			'class'=>'CButtonColumn',
            'template' => '{update} {delete}',
		),
	),
)); ?>
