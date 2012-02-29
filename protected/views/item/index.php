<?
$title = TypeItem::model()->TitleType($id);
$this->title= $title;

$h = " р.";
if($id == '1') $h = " р./ч.";
?>
<h1><?= $title ?><span class="img"><img src="/resources/images/catalog/<?= $id; ?>.png"
                                                                    alt="0"/></span></h1>

<? foreach ($model as $item): ?>
<div class="item">
    <div class="name"><b>
        &nbsp;</b><?= CHtml::link("<em>" . $item->name . "</em>", array('item/one', 'id_item' => $item->id, 'type' => 'item'))?>
    </div>
    <div class="tel"></div>
    <div class="price"><span><?= $item->price; ?><?= $h;?></span></div>
    <div class="t_center"><?= CHtml::image('/resources/upload/' . $item->id . "_main.jpg");?></div>
    <div class="line"></div>
</div>
<? endforeach; ?>
 
