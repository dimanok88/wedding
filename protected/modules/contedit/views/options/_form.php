<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'options-form',
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sys_name'); ?>
		<?php echo $form->textField($model,'sys_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sys_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->