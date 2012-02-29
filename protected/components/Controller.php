<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public $title;
    public $pageKey;

    public $pageDesc;


    public function generate_password($number = 5)
    {
        $arr = array('a', 'b', 'c', 'd', 'e', 'f',
                     'g', 'h', 'i', 'j', 'k', 'l',
                     'm', 'n', 'o', 'p', 'r', 's',
                     't', 'u', 'v', 'x', 'y', 'z',
                     'A', 'B', 'C', 'D', 'E', 'F',
                     'G', 'H', 'I', 'J', 'K', 'L',
                     'M', 'N', 'O', 'P', 'R', 'S',
                     'T', 'U', 'V', 'X', 'Y', 'Z',
                     '1', '2', '3', '4', '5', '6',
                     '7', '8', '9', '0', '.', ',',
                     '(', ')', '[', ']', '!', '?',
                     '&', '^', '%', '@', '*', '$',
                     '<', '>', '/', '|', '+', '-',
                     '{', '}', '`', '~');
        // Генерируем пароль
        $pass = "";
        for ($i = 0; $i < $number; $i++)
        {
            // Вычисляем случайный индекс массива
            $index = rand(0, count($arr) - 1);
            $pass .= $arr[$index];
        }
        return $pass;
    }

    public function cutString($string, $maxlen) {
        $len = (mb_strlen($string) > $maxlen)
            ? mb_strripos(mb_substr($string, 0, $maxlen), ' ')
            : $maxlen
        ;
        $cutStr = mb_substr(strip_tags($string), 0, $len);
        return (mb_strlen($string) > $maxlen)
            ? $cutStr . '...'
            : $cutStr
        ;
    }

    public function commentsList($id_item)
    {
        $criteria=new CDbCriteria;

		$criteria->compare('id_item',$id_item);

        $dataProvider=new CActiveDataProvider('Comments', array(
			'criteria'=>$criteria,
		));
		return $this->renderPartial('application.views.item._comments',array(
			'dataProvider'=>$dataProvider,
		), false,true);
    }

    public function getOptions($name)
	{
		$options = Options::model()->find('sys_name=:name', array(':name'=>$name));
		return $options['value'];
	}
}