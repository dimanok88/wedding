<?php

class DefaultController extends ContController
{
	public function actionIndex()
	{
        $type=new CActiveDataProvider('TypeItem');
		$this->render('index',array('type'=>$type));
	}
}