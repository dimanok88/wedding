<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_item'); ?>
		<?php echo $form->textField($model,'id_item'); ?>
		<?php echo $form->error($model,'id_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_brony'); ?>
		<?php echo $form->textField($model,'date_brony'); ?>
		<?php echo $form->error($model,'date_brony'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_hours'); ?>
		<?php echo $form->textField($model,'total_hours'); ?>
		<?php echo $form->error($model,'total_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price'); ?>
		<?php echo $form->error($model,'total_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->