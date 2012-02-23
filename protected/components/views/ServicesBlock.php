<ul id="slider">
    <? foreach($servs as $serv):?>
    <li>
        <?= CHtml::link('
            <span class="img"><img src="'.Yii::app()->request->baseUrl.'/resources/images/catalog/'.$serv->id.'.png"
                                   alt=""/></span>
            <span class="title">'.$serv->title.'</span>', array('item/index', 'id'=>$serv->id));?>
    </li>
    <? endforeach;?>
</ul>