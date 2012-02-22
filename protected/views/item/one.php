<h1><?= $item->name; ?></h1>

    <?= Pictures::model()->AllPic($item->id)?>

<div class="clear"></div>
<div>
    <?= $item->description; ?>
</div>

    <?php if(Yii::app()->user->hasFlash('succ')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('succ'); ?>
        </div>
    <?php endif; ?>

<?php echo $this->renderPartial('_brony', array('model'=>$model, 'user'=>$user)); ?>

<?php echo $this->renderPartial('_comment_form', array('comment'=>$comment)); ?>

<?
$cs = Yii::app()->clientScript;
// регистрация css-ресурсов
// через указание URL
$cs->registerCssFile('/resources/js/zoom/cloud-zoom.css');
$cs->registerScriptFile('/resources/js/zoom/cloud-zoom.1.0.2.js');
?>
