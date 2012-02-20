<ul>
    <? foreach($cat as $c):?>
        <li><?= CHtml::link($c->title, array('item/index', 'id'=>$c->id)) ?></li>
    <? endforeach;?>
</ul>
