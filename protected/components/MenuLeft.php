<?php
class MenuLeft extends CWidget {
    public function run() {
    	$model= new Pages();

    	$criteria = new CDbCriteria();
        $criteria->compare('active',1);
        $criteria->compare('type','page');
    	$pages = $model->findAll($criteria);

    	$this->render('MenuLeft', array('pages'=>$pages));
    }
}