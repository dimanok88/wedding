<div style="width: 550px; margin: 0 auto;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-form',
	'enableAjaxValidation'=>false,
)); ?>
    <div class="row">
         ОБРАТНЫЙ ЗВОНОК
         <?php $this->widget('CMaskedTextField', array(
         'name' => 'phone',
         'attribute' => 'phone',
         'mask' => '(999)999-99-99',
         'htmlOptions' => array('size' => 11)
         )); ?>

         <?php echo CHtml::ajaxButton ("Отправить",
                              CController::createUrl('orders/bphone'),
                              array('update' => '#succ_phone_footer', 'type'=>'GET',
                                   'beforeSend'=>'function(){$("#succ_phone_footer").html("Ждите...");}'),
                              array('id'=>'uploadphoto'));
?>
        <span id="succ_phone_footer"></span>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
