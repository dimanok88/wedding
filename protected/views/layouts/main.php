<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <?
    $this->pageTitle = $this->getOptions('meta_title');

	if(empty($this->title)) $this->title = $this->pageTitle;
    else $this->title = $this->title." ".$this->getOptions('meta_title');
	if(empty($this->pageKey)) $this->pageKey = $this->getOptions('meta_keywords');
	if(empty($this->pageDesc)) $this->pageDesc = $this->getOptions('meta_description');
    ?>

	<title><?php echo CHtml::encode($this->title); ?></title>
	<?= CHtml::metaTag( $this->pageKey, 'keywords')?>
	<?= CHtml::metaTag( $this->pageDesc, 'description')?>

    	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
</head>
<body>
<? if(isset(Yii::app()->user->content)) echo Yii::app()->user->content;?>
<div class="wrapper">
	<!-- start HEADER -->
	<div class="header">
		<div class="top">
			<div class="in">
				<div class="fll round_4"><a href="#">В избранное</a></div>
				<div class="flr round_4"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/resources/images/other/share.png" alt="0" style="margin: 0 0 -4px" /></a></div>
			</div>
		</div>
		
		<div class="row mid">
			<div class="ornament"></div>
			<div class="side_l"><div class="side_r">
				<div class="in">
					<div class="flower"></div>
					<div class="flr logo"><a href="/">Свадьба Воронеж</a><em>Информационный свадебный портал</em></div>
				</div>	
			</div></div>
		</div>
		
		<div class="bot_place">
			<div class="row bot"><div class="side_l"><div class="side_r">
				<div class="in">
					<? $this->widget('application.components.NewsBlock');?>
					<div class="row slider_place">
						<div class="flr title">Каталог свадебных услуг</div>
						<div class="in">
							<? $this->widget('application.components.ServicesBlock');?>
						</div>
					</div>
				</div>
			</div></div></div>
		</div>
		
	</div>
	<!-- end HEADER -->
	<div class="container">
		<div class="side_l"><div class="side_r">
			<div class="out">
				<div class="flower"></div>
				<div class="row in">
					<div class="content-bg">
						<!-- start CONTENT -->
						<div class="content">
							<?php echo $content; ?>
						</div>
						<!-- end CONTENT -->
					</div>
					<!-- start LEFT-BLOCK -->
					<div class="left-block">
						<? $this->widget('application.components.MenuLeft');?>
					</div>
					<!-- end LEFT-BLOCK -->
				</div>
			</div>
		</div></div>
	</div>
	<div class="down"></div>
</div>
<!-- start FOOTER -->
<div class="footer">
	<div class="in">
		<div class="fll chair"></div>
		<div class="fll counter">
			<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/resources/images/other/02.gif" alt="0" /></a>
		</div>
		<div class="flr up"><a href="#" onclick="scroll(0,0); return false"><span>Наверх</span></a></div>
	</div>
</div>
<!-- end FOOTER -->

<!-- start SCRIPTS -->
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/slider.js" type="text/javascript"></script>
<!-- end SCRIPTS-->
</body>
</html>
