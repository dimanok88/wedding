<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->title), array('item/', 'type'=>$data->id)); ?>
    <br />
</div> 