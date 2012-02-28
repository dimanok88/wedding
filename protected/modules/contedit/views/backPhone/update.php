<?php
$this->breadcrumbs=array(
	'Back Phones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BackPhone', 'url'=>array('index')),
	array('label'=>'Create BackPhone', 'url'=>array('create')),
	array('label'=>'View BackPhone', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BackPhone', 'url'=>array('admin')),
);
?>

<h1>Update BackPhone <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>