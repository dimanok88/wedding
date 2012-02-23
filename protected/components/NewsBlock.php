<?php
class NewsBlock extends CWidget {
    public function run() {
    	$model= new Pages();

    	$criteria = new CDbCriteria();
        $criteria->compare('active',1);
        $criteria->compare('type','news');
        $criteria->compare('category','1');
        $criteria->limit = 2;
    	$news = $model->findAll($criteria);

    	$this->render('newsBlock', array('news'=>$news));
    }


}