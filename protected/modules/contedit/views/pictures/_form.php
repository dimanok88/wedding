<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pictures-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->textField($model,'pic',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'format'); ?>
		<?php echo $form->textField($model,'format',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'format'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_item'); ?>
		<?php echo $form->textField($model,'id_item'); ?>
		<?php echo $form->error($model,'id_item'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->