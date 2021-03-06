<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_item
 * @property string $date_brony
 * @property integer $total_hours
 * @property string $date_add
 * @property double $total_price
 */
class Orders extends CActiveRecord
{
    public $dogovor;
    public $type_item;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

    public function beforeSave() {
	    if ($this->isNewRecord) {
	        $this->date_add = time();
	    }

        $this->SendMail();

        $this->total_price = $this->TotalPrice($this->id_item, $this->total_hours);
        
        $this->date_brony = CDateTimeParser::parse($this->date_brony,'yyyy-MM-dd hh:mm:ss');
        $this->date_brony_end = $this->date_brony + $this->total_hours*3600;

	    return parent::beforeSave();
	}

    public function beforeValidate()
    {
        if (!Yii::app()->user->checkAccess('moderator') || !Yii::app()->user->checkAccess('admin')) {
            if($this->SuccesTime($this->date_brony, $this->id_item) > 0)
                $this->addError('date_brony', 'Эта дата и время уже забронированы. Выберите другую дату и время.');
        }
        return parent::beforeValidate();
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, id_item, total_hours, date_brony, dogovor', 'required'),
			array('id_user, id_item, total_hours, date_brony_end, succ_time', 'numerical', 'integerOnly'=>true),
			array('total_price, type_item', 'numerical'),
			//array('date_brony', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, date_brony_end, id_item, succ_time, dogovor, date_brony, total_hours, date_add, total_price', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Пользователь',
			'id_item' => 'Контент',
			'date_brony' => 'Дата бронирования',
            'date_brony_end' => 'Окончание Даты бронирования',
			'total_hours' => 'Количество часов',
			'date_add' => 'Дата Добавления',
			'total_price' => 'Общая сумма',
            'succ_time' => 'Принято',
            'dogovor' => 'Условия бронирования',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('id_user',$this->id_user);
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
        if (Yii::app()->user->checkAccess('moderator') && !Yii::app()->user->checkAccess('admin')) {
            $id_item = explode(',', Yii::app()->user->content);
            $criteria->addInCondition('id_item', $id_item);
            //$criteria->compare('id_item',);
        }

        $criteria->compare('id_item',$this->id_item);
        $criteria->compare('date_brony',$this->date_brony,true);
        $criteria->compare('date_brony_end',$this->date_brony_end,true);
        $criteria->compare('total_hours',$this->total_hours);
        $criteria->compare('date_add',$this->date_add,true);
        $criteria->compare('total_price',$this->total_price);
        $criteria->compare('succ_time',$this->succ_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function TotalPrice($id_item,$hour)
    {
        $content = Item::model()->findByPk($id_item);
        if($content['type'] == '1') $total = $hour * $content['price'];
        else $total = $content['price'];

        return $total;
    }

    public function dateBrony($id_item){
        $date = $this->findAll('id_item=:id_i', array(':id_i'=>$id_item));
        $array_date = array();

        foreach($date as $d)
        {
            $f_date = Users::model()->getDate($d->date_brony, true);
            $array_date[$d->id] = CDateTimeParser::parse($f_date,'yyyy.MM.dd');
        }

        return $array_date;
    }

    public function dateSucc($id_item){
        $date = $this->findAll('id_item=:id_i AND succ_time="1"', array(':id_i'=>$id_item));
        $array_date = array();

        foreach($date as $d)
        {
            $f_date = Users::model()->getDate($d->date_brony, true);
            $array_date[$d->id] = CDateTimeParser::parse($f_date,'yyyy.MM.dd');
        }

        return $array_date;
    }

    public function SuccesTime($brony, $id = '')
    {
        $br = CDateTimeParser::parse($brony,'yyyy-MM-dd hh:mm:ss');
        if(!empty($id))
            $all_time = $this->count('id_item=:id AND '.$br.' BETWEEN date_brony AND date_brony_end', array(":id"=>$id));
        else $all_time = array();
        return $all_time;
    }


    public function SendMail()
    {
        $email = Yii::app()->email;

        $email->from = Controller::getOptions('admin_email');
        $email->language = "ru";
        $email->contentType = 'windows-1251';
        $email->to = Controller::getOptions('admin_email');
        $email->subject = 'Бронирование';
        $email->view = 'mail_brony';

        $user =Users::model()->getName($this->id_user);
		$item =Item::model()->getItem($this->id_item);
        $date = Users::model()->getDate($this->date_brony);
		$hours = $this->total_hours;

        $email->viewVars = array('user'=>$user,
                                 'item'=>$item,
                                 'date'=>$date,
                                 'hours'=>$hours,
                            );
        $email->send();
    }
}