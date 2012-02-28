<?php

class PagesController extends Controller
{
	public function actionView($page, $type)
    {
        $page = Pages::model()->findByPk($page);
        $comment = new Comments();

        $this->render('view', array('page'=>$page, 'comment'=>$comment));
    }

    public function actionArticles($cat, $type)
    {
        $art = Pages::model()->findAll('category=:cat', array(":cat"=>$cat));
        $title = Category::model()->getNameCat($cat);

        $this->render('article', array('page'=>$art, 'type'=>$type, 'title'=>$title));
    }

    public function actionDogovor($type)
    {
        $art = Pages::model()->find('id_item=:id_i AND type="dogovor"', array(":id_i"=>$type));
        $this->layout = '//layouts/none';
        $this->render('dogovor', array('page'=>$art));
    }
}
