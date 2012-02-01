<?php

class DefaultController extends ContController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}