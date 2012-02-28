<?php
class MenuLeft extends CWidget {
    public function run() {
    	$model= new Pages();
        $cat_model= new Category();

    	$criteria = new CDbCriteria();
        $criteria->compare('active',1);
        $criteria->compare('type','page');
    	$pages = $model->findAll($criteria);

        $category = $cat_model->findAll();

    	$this->render('MenuLeft', array('pages'=>$pages, 'category'=>$category));
    }
}