<?php
$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
);
?>

<h1>Информационные страницы</h1>

<p>
Вы можете использовать следующие операторы для поиска (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>)
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'keywords',
		'description',
		'meta_title',
		'active'=>array(
            'name'=>'active',
            'filter'=>array('0'=>'Нет','1'=>'Да'),
            'value'=>'($data->active == 1) ? "Да" :  "Нет"'
        ),
		array(
            'header'=>'Действия',
			'class'=>'CButtonColumn',
            'template' => '{update} {delete}',
            'buttons'=>array
             (
                'delete' => array
                (
                    'label'=>'Удалить',
                    'url'=>'Yii::app()->createUrl("contedit/pages/delete", array("id"=>$data->id))',
                ),
                'update'=>array(
                   'label'=>'Редактировать',
                   'url'=>'Yii::app()->createUrl("contedit/pages/create", array("id"=>$data->id))',
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
