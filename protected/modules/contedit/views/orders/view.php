<?php
$this->menu=array(
	array('label'=>'Забронировать', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('create', 'id'=>$model->id)),
	array('label'=>'Удалить бронь', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Удалить бронь?')),
);
?>

<h1>Бронь №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user'=>array(
            'name'=>'id_user',
            'value'=>Users::model()->getName($model->id_user),
        ),
		'id_item'=>array(
            'name'=>'id_item',
            'value'=>Item::model()->getItem($model->id_item),
        ),
        'date_brony'=>array(
            'name'=>'date_brony',
            'value'=>Users::model()->getDate($model->date_brony),
        ),
		'total_hours',
		'date_add'=>array(
            'name'=>'date_add',
            'value'=>Users::model()->getDate($model->date_add),
        ),
		'total_price'=>array(
            'name'=>'total_price',
            'value'=>Orders::model()->TotalPrice($model->id_item, $model->total_hours)
        ),
	),
)); ?>
