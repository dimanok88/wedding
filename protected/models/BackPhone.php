<?php

/**
 * This is the model class for table "back_phone".
 *
 * The followings are the available columns in table 'back_phone':
 * @property integer $id
 * @property string $phone
 * @property integer $date_add
 */
class BackPhone extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BackPhone the static model class
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
		return 'back_phone';
	}

     public function beforeSave() {
	    if ($this->isNewRecord) {
	        $this->date_add = time();
	    }
        //$this->phone = str_replace(array('(',')','-'), '', $this->phone);

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
			array('phone, date_add', 'required'),
			array('date_add', 'numerical', 'integerOnly'=>true),
			array('phone', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, phone, date_add', 'safe', 'on'=>'search'),
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
			'phone' => 'Телефон',
			'date_add' => 'Дата добавления',
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
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('date_add',$this->date_add);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}