<ul id="slider">
    <? foreach($servs as $serv):?>
    <li>
        <a href="#">
            <span class="img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/resources/images/catalog/<?= $serv->id?>.png"
                                   alt=""/></span>
            <span class="title"><?= $serv->title?></span>
        </a>
    </li>
    <? endforeach;?>
</ul>