<?
$this->title= $title;
$date = '';
//if($type == 'news') $date = '<span class="date">'.Users::model()->getDate($page->date, true).'</span>';
?>
<h1><?= $title;?></h1>
<div>
    <ul>
    <? foreach($page as $art):?>
        <li><?= CHtml::link('<span>'.$art->title.'</span>', array('pages/view', 'page'=>$art->id, 'type'=>'news')) ?>
            <div><?= $this->cutString($art->text, 200)?></div>
        </li>
    <? endforeach; ?>
    </ul>
</div>