<?php

class PagesController extends Controller
{
	public function actionView($page, $type)
    {
        $page = Pages::model()->findByPk($page, 'active="1"');
        $comment = new Comments();

        $this->render('view', array('page'=>$page, 'comment'=>$comment));
    }

    public function actionArticles($cat, $type)
    {
        $art = Pages::model()->findAll('category=:cat AND active="1"', array(":cat"=>$cat));
        $title = Category::model()->getNameCat($cat);

        $this->render('article', array('page'=>$art, 'type'=>$type, 'title'=>$title));
    }

    public function actionDogovor($type)
    {
        $art = Pages::model()->find('id_item=:id_i AND type="dogovor" AND active="1"', array(":id_i"=>$type));
        $this->layout = '//layouts/none';
        $this->render('dogovor', array('page'=>$art));
    }
}
