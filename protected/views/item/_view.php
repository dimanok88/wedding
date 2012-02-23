<div class="view">

	<?php echo Users::model()->getDate(CHtml::encode($data->date_add))."  ".CHtml::encode($data->name_user);?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />


</div>
    <br/>