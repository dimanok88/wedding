<?php
class MenuMain extends CWidget {
    public function run() {
    	$model= new TypeItem();

    	$criteria = new CDbCriteria();
    	$cat = $model->findAll($criteria);

    	$this->render('MenuMain', array('cat'=>$cat));
    }
}
