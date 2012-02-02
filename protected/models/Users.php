<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $fast_name
 * @property string $phone
 * @property string $email
 * @property string $date_reg
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

    public function beforeSave() {
	    if ($this->isNewRecord) {
	        $this->date_reg = time();
	    }

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
			array('name, fast_name, phone, email', 'required'),
            array('phone, email', 'unique'),
            array('email', 'email'),
            array('phone', 'match', 'pattern' => '!9[0-9]{9}!u'),
			array('name, fast_name', 'length', 'max'=>40),
			array('phone', 'length', 'max'=>11),
			array('email', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, fast_name, phone, email, date_reg', 'safe', 'on'=>'search'),
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
			'name' => 'Имя',
			'fast_name' => 'Фамилия',
			'phone' => 'Телфон',
			'email' => 'E-mail',
			'date_reg' => 'Дата регистрации',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fast_name',$this->fast_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date_reg',$this->date_reg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getName($id)
    {
        $user = $this->findByPk($id);
        $name = $user['name']." (".$user['phone'].")";
        return $name;
    }

    public function getDate($time)
    {
        $time = date('Y-m-d H:i:s', $time);
        return $time;
    }

    public function AllUsers()
    {
        $users = $this->findAll();
        $new_list_users = array();
        foreach($users as $user){
            $new_list_users[$user['id']] = $user['name']."(".$user['phone'].")";
        }

        return $new_list_users;
    }
}