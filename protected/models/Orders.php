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
        $this->total_price = $this->TotalPrice($this->id_item, $this->total_hours);
        $this->date_brony = CDateTimeParser::parse($this->date_brony,'yyyy-MM-dd hh:mm:ss');

	    return parent::beforeSave();
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, id_item, total_hours, date_brony', 'required'),
			array('id_user, id_item, total_hours', 'numerical', 'integerOnly'=>true),
			array('total_price', 'numerical'),
			//array('date_brony', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, id_item, date_brony, total_hours, date_add, total_price', 'safe', 'on'=>'search'),
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
			'total_hours' => 'Количество часов',
			'date_add' => 'Дата Добавления',
			'total_price' => 'Общая сумма',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_item',$this->id_item);
		$criteria->compare('date_brony',$this->date_brony,true);
        $criteria->compare('date_brony_end',$this->date_brony,true);
		$criteria->compare('total_hours',$this->total_hours);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('total_price',$this->total_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function TotalPrice($id_item,$hour)
    {
        $content = Item::model()->findByPk($id_item);
        $total = $hour * $content['price'];

        return $total;
    }

    public function SuccesTime($brony, $hour)
    {
          
    }
}