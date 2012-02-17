<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Обязательные поля <span class="required">*</span></p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login'); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fast_name'); ?>
		<?php echo $form->textField($model,'fast_name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'fast_name'); ?>
	</div>

	<div class="row">
                    <?php echo $form->labelEx($model,'phone'); ?>
                    <?php $this->widget('CMaskedTextField', array(
                    'model' => $model,
                    'attribute' => 'phone',
                    'mask' => '(999)999-99-99',
                    'htmlOptions' => array('size' => 10)
                    )); ?>
                    <?php echo $form->error($model,'phone'); ?>
                </div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

    <div class="row">
         <?php echo $form->labelEx($model,'password'); ?>
         <?php echo $form->textField($model, 'password', array('value'=>'')); ?>
         <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
          <?php echo $form->labelEx($model,'password_req'); ?>
          <?php echo $form->textField($model, 'password_req', array('value'=>'')); ?>
          <?php echo $form->error($model,'password_req'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->