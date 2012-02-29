<?php

define('CSV_DELIMITER', ';');
/**
 * Created by JetBrains PhpStorm.
 * User: nike
 * Date: 02.12.11
 * Time: 16:25
 * To change this template use File | Settings | File Templates.
 */
 
class UsersController extends ContController {

    public function actionIndex()
    {
        if (!Yii::app()->user->isGuest){
            $this->redirect(array('users/listUsers'));
        }
        $this->redirect(array('site/login'));
    }


    // Список пользователей 
    public function actionListUsers(){
        $model=new Users('search'); //загрузка модели с возможностью поиска по шинам

        $url = "http://".$_SERVER['HTTP_HOST'].Yii::app()->request->getRequestUri();
		Yii::app()->user->setState('url_get', $url);

		$model->unsetAttributes();  // clear any default values
		if( isset($_GET[get_class($model)]) )
        {
			$model->attributes = $_GET[get_class($model)];
        }
        $this->render('listUsers', array('model'=>$model));
    }
    ////////////////////////////////////////////

    //Добавление и редактирование пользователя. Если id = '' тогда новый пользователь иначе происходит редактирование
    public function actionUpdate($id='')
    {
        $model = new Users();

        $url = Yii::app()->user->getState('url_get');

        if(!empty($id)) {
            $model = Users::model()->findByPk($id);
            $model->content_id = explode(',', $model->content_id);
        }

        if(isset($_POST['Users']))
        {
            if($id != '') $pass = $model->password;
            
            $model->attributes = $_POST[get_class($model)];
            if(empty($_POST[get_class($model)]['password']) && $id != '')
            {
                $model->password = $pass;
                $model->password_req = $model->password;
            }
            else
            {
                $model->password = crypt($_POST[get_class($model)]['password'], substr($_POST[get_class($model)]['password'], 0, 2));
                $model->password_req = crypt($_POST[get_class($model)]['password_req'], substr($_POST[get_class($model)]['password_req'], 0, 2));
            }
            if($model->save())
            {
                $this->redirect(array('users/listUsers'));
            }
        }

        $this->render('update', array('model'=>$model));
    }
    ////////////////////////////////////////////

    //Удаление пользователя
    public function actionDelete()
    {
        if( Yii::app()->request->isPostRequest )
		{
			Users::model()->findbyPk($_GET['id'])->delete();

			if( !isset($_GET['ajax']) )
            {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('users/listUsers'));
            }
		}
		else
        {
			throw new CHttpException(400, 'Ошибка в запросе.');
        }
    }

    //Просмотр данных пользователя найденых через autoComplete
    public function actionViewUser($ids)
    {
        $user = Users::model()->findByPk($ids);
        $this->render('viewUser', array('user'=>$user));
    }

}