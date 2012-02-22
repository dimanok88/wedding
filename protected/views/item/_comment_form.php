<div class="form">

    <h1>Комментарии</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
    'action'=>array('comments/add', 'type'=>$_GET['type'], 'id_item'=>$_GET['id_item'])
	//'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($comment); ?>
    <div class="row">
		<?php echo $form->labelEx($comment,'name_user'); ?>
		<?php echo $form->textField($comment,'name_user'); ?>
		<?php echo $form->error($comment,'name_user'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($comment,'text'); ?>
		<?php echo $form->textArea($comment,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($comment,'text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Добавить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
 
