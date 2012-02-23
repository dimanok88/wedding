<div class="title">Категории</div>
<ul>
    <?foreach($pages as $page):?>
        <li><?= CHtml::link('<span>'.$page['title'].'</span>', array('pages/view', 'page'=>$page->id, 'type'=>'page')) ?></li>
    <? endforeach; ?>
</ul>