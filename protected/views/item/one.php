<h1><?= $item->name; ?></h1>

    <?= Pictures::model()->AllPic($item->id)?>

<div class="clear"></div>
<div>
    <?= $item->description; ?>
</div>

    <?php if(Yii::app()->user->hasFlash('succ')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('succ'); ?>
        </div>
    <?php endif; ?>

    <div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_brony'); ?>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
             'model'=>$model,
             'name'=>'date_brony',
             'options'=>array(
               'stepMinute'=> 10,
             ),
           )); ?>
		<?php echo $form->error($model,'date_brony'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_hours'); ?>
		<?php echo $form->textField($model,'total_hours'); ?>
		<?php echo $form->error($model,'total_hours'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($user,'name'); ?>
		<?php echo $form->textField($user,'name'); ?>
		<?php echo $form->error($user,'name'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($user,'phone'); ?>
		<?php echo $form->textField($user,'phone'); ?>
		<?php echo $form->error($user,'phone'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php echo $form->textField($user,'email'); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($user,'login'); ?>
		<?php echo $form->textField($user,'login'); ?>
		<?php echo $form->error($user,'login'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?
$cs = Yii::app()->clientScript;
// регистрация css-ресурсов
// через указание URL
$cs->registerCssFile('/resources/js/zoom/cloud-zoom.css');
$cs->registerScriptFile('/resources/js/zoom/cloud-zoom.1.0.2.js');
?>