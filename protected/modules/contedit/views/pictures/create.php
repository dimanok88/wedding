<?php
$this->breadcrumbs=array(
	'Pictures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pictures', 'url'=>array('index')),
	array('label'=>'Manage Pictures', 'url'=>array('admin')),
);
?>

<h1>Create Pictures</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>