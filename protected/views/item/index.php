<ul>
    <? foreach($model as $item):?>
        <li><?= CHtml::image('/resources/upload/'.$item->id."_main.jpg")."<br/>".CHtml::link($item->name, array('item/one', 'id_item'=>$item->id, 'type'=>'item')) ?></li>
    <? endforeach;?>
</ul>
 
