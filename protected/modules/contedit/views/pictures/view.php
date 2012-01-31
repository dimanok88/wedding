<?php
$this->breadcrumbs=array(
	'Pictures'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pictures', 'url'=>array('index')),
	array('label'=>'Create Pictures', 'url'=>array('create')),
	array('label'=>'Update Pictures', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pictures', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pictures', 'url'=>array('admin')),
);
?>

<h1>View Pictures #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pic',
		'format',
		'id_item',
	),
)); ?>
