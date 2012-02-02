<?php
$this->menu=array(
	array('label'=>'Забронировать', 'url'=>array('create')),
);
?>

<h1>ЗАбронированные</h1>

<p>
Вы можете использовать следующие операторы для поиска (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>)
</p>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'id',
		'id_user'=>array(
            'name'=>'id_user',
            'value'=>'Users::model()->getName($data->id_user)',
        ),
		'id_item'=>array(
            'name'=>'id_item',
            'value'=>'Item::model()->getItem($data->id_item)',
        ),
        'date_brony'=>array(
            'name'=>'date_brony',
            'value'=>'Users::model()->getDate($data->date_brony)'
        ),
		'total_hours',
		'date_add'=>array(
            'name'=>'date_add',
            'value'=>'Users::model()->getDate($data->date_add)'
        ),
		'total_price'=>array(
            'name'=>'total_price',
            'value'=>'Orders::model()->TotalPrice($data->id_item, $data->total_hours)'
        ),
		array(
            'header'=>'Действия',
			'class'=>'CButtonColumn',
            'template' => '{view}{update} {delete}',
            'buttons'=>array
             (
                'update'=>array(
                   'label'=>'Редактировать',
                   'url'=>'Yii::app()->createUrl("contedit/orders/create", array("id"=>$data->id))',
                ),
                /*'update' => array
                (
                    'label'=>'Update',
                    'url'=>'Yii::app()->createUrl("item/upnew", array("id"=>$data->id, "type"=>"tire"))',
                ),*/
            ),
		),
	),
)); ?>
