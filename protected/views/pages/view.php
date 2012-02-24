<?
$this->title= $page->meta_title;
$this->pageDesc= $page->description;
$this->pageKey= $page->keywords;

$date = '';
if($page->type == 'news') $date = '<span class="date">'.Users::model()->getDate($page->date, true).'</span>';
?>
<h1><?= $page->title;?><?= $date?></h1>
<div>
    <?= $page->text;?>
</div>
<br/>
<br/>
    
<?php echo $this->renderPartial('application.views.item._comment_form', array('comment'=>$comment)); ?>

<?php $this->commentsList($page->id); ?>
