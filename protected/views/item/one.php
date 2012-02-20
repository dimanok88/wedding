<h1><?= $item->name; ?></h1>

    <?= Pictures::model()->AllPic($item->id)?>
<div>
    <?= $item->description; ?>
</div>


<?
$cs = Yii::app()->clientScript;
// регистрация css-ресурсов
// через указание URL
$cs->registerCssFile('/resources/js/zoom/cloud-zoom.css');
$cs->registerScriptFile('/resources/js/zoom/cloud-zoom.1.0.2.js');
?>