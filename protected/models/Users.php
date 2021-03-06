<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $name
 * @property string $role
 * @property integer $active
 */
class Users extends CActiveRecord
{
    public $password_req;
    public $send_mail;

    const ITEM_TYPE_ADMIN = 'admin';
    const ITEM_TYPE_MODERATOR = 'moderator';
    const ITEM_TYPE_GUEST = 'guest';

    const USER_TYPE_FIZ = 'fiz';
    const USER_TYPE_UR = 'ur';

    const USER_NAL= 'nal';
    const USER_BEZNAL = 'beznal';

	/**
	 * Returns the static model of the specified AR class.
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
	        $this->date_reg = new CDbExpression('NOW()');
            $this->id_user_reg = Yii::app()->user->id;
            if($this->id_user_reg == 0)
                $this->code_active = $this->GenerateCode();
            //if($this->send_mail == 1)
            $this->SendMailUser();
	    }
        if(!empty($this->content_id)) $this->content_id = implode(',', $this->content_id);

	    return parent::beforeSave();
	}

    public function beforeValidate() {
        $this->phone = str_replace(array('(',')','-'), '', $this->phone);

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
			array('login, password, email, name, role, phone', 'required'),
			array('active, id_user_reg, send_mail', 'numerical', 'integerOnly'=>true),
            array('login, email, code_active, phone', 'unique'),
			array('login, name', 'length', 'max'=>30),
			array('password', 'length', 'max'=>60),
            array('password_req', 'length', 'max'=>60),
			array('password_req', 'compare', 'compareAttribute' => 'password'),
			array('email', 'length', 'max'=>40),
            array('organization, address pay,phone, content_id', 'default'),
			array('role', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, send_mail, password, email, pay, address, date_reg, phone, id_user_reg, code_active, name, role, active', 'safe', 'on'=>'search'),
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
			'id' => '№',
			'login' => 'Логин',
			'password' => 'Пароль',
			'email' => 'E-mail',
			'name' => 'Имя',
			'role' => 'Роль',
			'active' => 'Вкл.',
            'send_mail' => 'Отправить уведомление',
            'password_req'=>'Повторите пароль',
            'address'=>'Адрес доставки',
            'date_reg'=>'Дата регистрации',
            'phone'=>'Телефон',
            'id_user_reg'=>'Регистратор',
            'code_active'=>'Код активации',
            'organization'=>'Организация',
            'pay'=>'Способ оплаты',
            'content_id'=>'Тип контента',
            'date_modify'=>'Дата модификации',
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
		$criteria->compare('login',$this->login,'LIKE');
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('active',$this->active);
		$criteria->compare('id_user_reg',$this->id_user_reg,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address);
        $criteria->compare('organization',$this->organization,true);
        $criteria->compare('code_active',$this->code_active,true);
        $criteria->compare('pay',$this->pay);



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getActive($act)
    {
        if($act == 1) return 'Да';
        return 'Нет';

    }

    public function AllRoles()
    {
        return array(
            //self::ITEM_TYPE_ADMIN => 'Админ',
            self::ITEM_TYPE_MODERATOR => 'Модератор',
            self::ITEM_TYPE_GUEST => 'Пользователь',
        );
    }

    public function GenerateCode()
    {
        $code = md5($this->email);
        return $code;
    }

    public function PayUser()
    {
        return array(
            self::USER_NAL => 'Наличный расчет',
            self::USER_BEZNAL => 'Безналичный расчет',
        );
    }

    public function getName($id)
    {
        $user = $this->findByPk($id);
        $name = $user['name']." (".$user['phone'].")";
        return $name;
    }

    public function getDate($time,$short=false)
    {
        if(!is_numeric($time)) $time = CDateTimeParser::parse($time,'yyyy-MM-dd hh:mm:ss');
        if($short == true) $time = date('Y.m.d', $time);
        else $time = date('Y-m-d H:i:s', $time);
        
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

    public function SendMailUser()
    {
        $email = Yii::app()->email;
        
        $email->from = Controller::getOptions('admin_email');
        $email->language = "ru";
        $email->contentType = 'windows-1251';
        $email->to = Controller::getOptions('admin_email');
        $email->subject = 'Свадьба Воронеж';
        $email->view = 'regUser';
        $email->viewVars = array('login'=>$this->login,
                                 'phone'=>$this->phone,
                                 'name'=>$this->name,
                                 'password'=>$this->password,
                            );
        $email->send();
    }
}