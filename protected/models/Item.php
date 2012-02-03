<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property double $price
 * @property string $date_add
 * @property integer $active
 */
class Item extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Item the static model class
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
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, price, active', 'required'),
			array('active, type', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, price, date_add, active', 'safe', 'on'=>'search'),
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

    public function beforeSave() {
	    if ($this->isNewRecord) {
	        $this->date_add = time();
	    }

	    return parent::beforeSave();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'description' => 'Описание',
			'price' => 'Цена за час',
			'date_add' => 'Дата добавления',
			'active' => 'Вкл.',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($type='')
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;



		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('active',$this->active);
        $criteria->compare('type',$type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getItem($id)
    {
        $item = $this->findByPk($id);
        $name = $item['name']." (".$item['price']." р.)";
        return $name;
    }

    public function AllItems()
    {
        $items = $this->findAll();
        $new_list_items = array();
        foreach($items as $item){
            $new_list_items[$item['id']] = $item['name']."(".$item['price'].")";
        }

        return $new_list_items;
    }
}