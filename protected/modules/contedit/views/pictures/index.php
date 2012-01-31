<?php
$this->breadcrumbs=array(
	'Pictures',
);

$this->menu=array(
	array('label'=>'Create Pictures', 'url'=>array('create')),
	array('label'=>'Manage Pictures', 'url'=>array('admin')),
);
?>

<h1>Pictures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
