<?php

class PagesController extends Controller
{
	public function actionView($page, $type)
    {
        $page = Pages::model()->findByPk($page);
        $comment = new Comments();

        $this->render('view', array('page'=>$page, 'comment'=>$comment));
    }
}
