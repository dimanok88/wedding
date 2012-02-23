<?php
class ServicesBlock extends CWidget {
    public function run() {
    	$model= new TypeItem();

    	$criteria = new CDbCriteria();
    	$serv = $model->findAll($criteria);

    	$this->render('ServicesBlock', array('servs'=>$serv));
    }
}
