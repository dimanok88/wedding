<?php
$this->menu=array(
	array('label'=>'Все категории', 'url'=>array('admin')),
);
?>

<h1>Добавить/Редактировать категорию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>