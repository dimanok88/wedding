<div class="fll news_place">
    <div class="title">Новости</div>

    <?foreach($news as $n):?>
    <div class="item">
        <div class="row date"><span><?= Users::model()->getDate($n->date, 1); ?></span></div>
        <p><?= Controller::cutString($n->text, 80)?></p>

        <div class="t_right"><?= CHtml::link('Читать далее...', array('pages/view', 'page'=>$n->id,'type'=>$n->type));?></div>
    </div>
    <? endforeach;?>

</div>