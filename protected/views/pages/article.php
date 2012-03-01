<?
$this->title= $title;
?>
<h1><?= $title;?></h1>
<div>
    <ul class='news'>
    <? foreach($page as $art):?>
        <li><?
            if($type == 'news'){
                $date = '<span class="date">'.Users::model()->getDate($art->date, true).'</span>';
                echo $date;
            }
            ?>
            <?= CHtml::link('<span>'.$art->title.'</span>', array('pages/view', 'page'=>$art->id, 'type'=>'news')) ?>
            <div><?= $this->cutString($art->text, 200)?></div>
        </li>
    <? endforeach; ?>
    </ul>
</div>