<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="note">Обязательные поля <span class="required">*</span>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
                "model"=>$model,                # Data-Model
                "attribute"=>'description',         # Attribute in the Data-Model
                "height"=>'400px',
                "width"=>'100%',
                "fckeditor"=>Yii::app()->basePath."/fckeditor/fckeditor.php",
                "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                "config" => array("EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
            ) ); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->fileField($model,'foto'); ?>
		<?php echo $form->error($model,'foto'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file[]'); ?>
		<?php echo $form->error($model,'file[]'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file[]'); ?>
		<?php echo $form->error($model,'file[]'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file[]'); ?>
		<?php echo $form->error($model,'file[]'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file[]'); ?>
		<?php echo $form->error($model,'file[]'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file[]'); ?>
		<?php echo $form->error($model,'file[]'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file[]'); ?>
		<?php echo $form->error($model,'file[]'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file[]'); ?>
		<?php echo $form->error($model,'file[]'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file[]'); ?>
		<?php echo $form->error($model,'file[]'); ?>
	</div>

    <div>
        <?
            //if(!$model->isNewRecord)
            echo Pictures::model()->ModelPic($model->id);
        ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title'); ?>
		<?php echo $form->error($model,'meta_title'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'meta_keywords'); ?>
		<?php echo $form->textField($model,'meta_keywords'); ?>
		<?php echo $form->error($model,'meta_keywords'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'meta_desc'); ?>
		<?php echo $form->textField($model,'meta_desc'); ?>
		<?php echo $form->error($model,'meta_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
Yii::app()->clientScript->registerScript('index', "
jQuery('#pic_admin a.delete').live('click',function() {
if(!confirm('Вы уверены, что хотите удалить данный элемент?')) return false;
var th=this;
var afterDelete=function(){};
$.post($(this).attr('href'), function(data) {
  $('#pic_admin').html(data);
});
return false;
});");
?>