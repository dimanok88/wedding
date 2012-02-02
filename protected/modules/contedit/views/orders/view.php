<?php
$this->menu=array(
	array('label'=>'Забронировать', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить бронь', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Удалить бронь?')),
);
?>

<h1>Бронь №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user',
		'id_item',
		'date_brony',
		'total_hours',
		'date_add',
		'total_price',
	),
)); ?>
