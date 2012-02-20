<?php

class ItemController extends Controller
{
	/**
	 * Lists all models.
	 */
	public function actionIndex($id = '')
	{
		$model= Item::model()->findAll('type=:t AND active=1', array(':t'=>$id));

		$this->render('index',array(
			'model'=>$model,
		));
	}

    public function actionOne($id_item)
    {
        $item = Item::model()->findByPk($id_item);

        Yii::app()->getClientScript()->registerCoreScript('jquery');

        $this->render('one',array(
			'item'=>$item,
		));
    }
}
