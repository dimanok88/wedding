   <div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-form',
	'enableAjaxValidation'=>false,
)); ?>	
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
         <?php $this->widget('CMaskedTextField', array(
         'model' => $user,
         'attribute' => 'phone',
         'mask' => '(999)999-99-99',
         'htmlOptions' => array('size' => 10)
         )); ?>
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

    <div class="row">
		<?php echo CHtml::link('Условия бронирования', '#',
                               array('onClick'=>'window.open("'.(CController::createUrl('pages/dogovor', array('type'=>$type))).'", "dogovor", "width=600,height=420,scrollbars=yes"); return false;')); ?>
		<?php echo $form->checkBox($model,'dogovor', array('value'=>1, 'uncheckValue'=>'')); ?>
		<?php echo $form->error($model,'dogovor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->