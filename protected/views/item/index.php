<ul>
    <? foreach($model as $item):?>
        <li><?= CHtml::link($item->name, array('item/one', 'id_item'=>$item->id)) ?></li>
    <? endforeach;?>
</ul>
 
