<?
$this->title= $item->meta_title;
$this->pageDesc= $item->meta_desc;
$this->pageKey= $item->meta_keywords;
?>
<h1><?= $item->name; ?></h1>

    <?= Pictures::model()->AllPic($item->id)?>

<div class="clear"></div>
<div class="desc_item">
    <?= $item->description; ?>
</div>

    <?php if(Yii::app()->user->hasFlash('succ')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('succ'); ?>
        </div>
    <?php endif; ?>

<?php $this->widget('ext.simple-calendar.SimpleCalendarWidget'); ?>

<?php echo $this->renderPartial('_brony', array('model'=>$model, 'user'=>$user, 'type'=>$item->type)); ?>

<?php echo $this->renderPartial('_comment_form', array('comment'=>$comment)); ?>

<?php $this->commentsList($item->id); ?>
<?
//CVarDumper::dump(Orders::model()->dateBrony($item->id));

$cs = Yii::app()->clientScript;
// регистрация css-ресурсов
// через указание URL
$cs->registerCssFile('/resources/js/zoom/cloud-zoom.css');
$cs->registerScriptFile('/resources/js/zoom/cloud-zoom.1.0.2.js');
?>
