<div class="title">Категории</div>
<ul>
    <?foreach($pages as $page):?>
        <li><?= CHtml::link('<span>'.$page['title'].'</span>', array('pages/view', 'page'=>$page->id, 'type'=>'page')) ?></li>
    <? endforeach; ?>
    <?foreach($category as $cat):?>
        <li><?= CHtml::link('<span>'.$cat['title'].'</span>', array('pages/articles', 'cat'=>$cat->id, 'type'=>'news')) ?></li>
    <? endforeach; ?>
</ul>