<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Обязательные поля <span class="required">*</span></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
                "model"=>$model,                # Data-Model
                "attribute"=>'text',         # Attribute in the Data-Model
                "height"=>'400px',
                "width"=>'100%',
                "fckeditor"=>Yii::app()->basePath."/fckeditor/fckeditor.php",
                "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                "config" => array("EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
            ) ); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

    <?if(isset($_GET['type']) && $_GET['type'] == 'news'){ ?>
    <div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->DropDownList($model,'category', Category::model()->AllCat()); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>
    <? } ?>

    <?if(isset($_GET['type']) && $_GET['type'] == 'dogovor'){ ?>
    <div class="row">
		<?php echo $form->labelEx($model,'id_item'); ?>
		<?php echo $form->DropDownList($model,'id_item', TypeItem::model()->AllTypeItem()); ?>
		<?php echo $form->error($model,'id_item'); ?>
	</div>
    <? } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'meta_title'); ?>
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