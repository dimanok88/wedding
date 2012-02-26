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
			'model'=>$model,'id'=>$id
		));
	}

    public function actionOne($id_item)
    {
        $item = Item::model()->findByPk($id_item);
        $model = new Orders();
        $comment = new Comments();
        $user = new Users();
        
		if(isset($_POST['Orders']) && isset($_POST['Users']))
		{
            $model->attributes=$_POST['Orders'];
            $user->attributes=$_POST['Users'];
            $phone = str_replace(array('(',')','-'), '', $user->phone);
            $count_user = $user->find('phone=:p', array(':p'=>$phone));
            if(empty($count_user->id))
            {
                $user->role = 'guest';
                $password = $this->generate_password();
                $user->password = crypt($password, substr($password, 0, 2));
                $user->password_req = crypt($password, substr($password, 0, 2));
                if($user->save())
                {
                    $model->id_user = $user->id;
                    $model->id_item = $id_item;
                    if($model->save()){
                        Yii::app()->user->setFlash('succ', "Забронированно!");
                        $this->refresh();
                    }
                }
            }
            else
            {
                $model->id_user = $count_user['id'];
                $model->id_item = $id_item;
                if($model->save()){
                    Yii::app()->user->setFlash('succ', "Забронированно!");
                    $this->refresh();
                }
            }
		}

        Yii::app()->getClientScript()->registerCoreScript('jquery');

        $this->render('one',array(
			'item'=>$item, 'model'=>$model, 'user'=>$user, 'comment'=>$comment,
		));
    }
}
