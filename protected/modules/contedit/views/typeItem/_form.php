<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'type-item-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'СОхранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->