<?php

/**
 * This is the model class for table "pictures".
 *
 * The followings are the available columns in table 'pictures':
 * @property integer $id
 * @property string $pic
 * @property string $format
 * @property integer $id_item
 */
class Pictures extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pictures the static model class
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
		return 'pictures';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pic, id_item', 'required'),
			array('id_item', 'numerical', 'integerOnly'=>true),
			array('pic', 'length', 'max'=>60),
			array('format', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pic, format, id_item', 'safe', 'on'=>'search'),
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
			'pic' => 'Pic',
			'format' => 'Format',
			'id_item' => 'Id Item',
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
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('format',$this->format,true);
		$criteria->compare('id_item',$this->id_item);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

   public function loadPic($id, $f){
       if(!empty($id))
       {
           $imageHandler = new CImageHandler();
           $files = $f['tmp_name']['file'];
           $names = $f['name'] ['file'];

           $i = 0;
           foreach($files as $file){
              if(!empty($file)){
                $model = new Pictures();
                $model->pic = $names[$i];
                $model->id_item = $id;
                  echo $id;
                  //exit();
                if($model->save()){
                    $imageHandler->load ( $file )
                               ->save(Yii::app()->getBasePath() . '/../resources/upload/'.$id. "_".$model->id.".jpg");
                    $imageHandler->load ( $file )
                                 ->thumb(Yii::app()->params['imgThumbWidth'],Yii::app()->params['imgThumbHeight'])
                                 ->save(Yii::app()->getBasePath() . '/../resources/upload/'.$id. "_".$model->id."_small.jpg");
               }
              $i++;
           }
       }
           //exit();
     }
       else return false;
   }

   public function picDel($id)
   {
       $pic = $this->findAll('id_item=:id_i', array(':id_i'=>$id));
       foreach($pic as $p)
       {
            if(file_exists(Yii::app()->getBasePath() . '/../resources/upload/'.$id. "_".$p['id'].".jpg"))
            {
                unlink(Yii::app()->getBasePath() . '/../resources/upload/'.$id. "_".$p['id'].".jpg");
                unlink(Yii::app()->getBasePath() . '/../resources/upload/'.$id. "_".$p['id']."_small.jpg");
            }
            Pictures::model()->deleteByPk($p['id']);
       }
   }

    public function ModelPic($id , $class = 'pic_admin')
    {
        if(!empty($id)){
            $pictures = $this->findAll('id_item=:id_i', array(':id_i'=>$id));
            $pic_html = "<ul id='".$class."'>";
            foreach($pictures as $pic)
            {
                $link = '/resources/upload/'.$id. "_".$pic['id']."_small.jpg";
                $img = CHtml::image($link);
                $pic_html .= "<li>".$img."<br/>".CHtml::link('Удалить', array('pictures/delete', 'id'=>$pic['id'], 'model_id'=>$id), array('class'=>'delete'))."</li>";
            }

            $pic_html .="</ul>";
            return $pic_html;
        }
        else return false;
    }


    public function AllPic($id_item)
    {
        if(!empty($id_item)){
            $pictures = $this->findAll('id_item=:id_i', array(':id_i'=>$id_item));
            $pic_html = "";
            $i = 0;
            foreach($pictures as $pic)
            {

                $link = '/resources/upload/'.$id_item. "_".$pic['id']."_small.jpg";
                $link_big = '/resources/upload/'.$id_item. "_".$pic['id'].".jpg";
                $img = CHtml::image($link);
                if($i == 0)
                    $pic_html .= CHtml::link($img, $link_big, array('class' => 'cloud-zoom', 'id'=>'zoom1', 'rel'=>"adjustX: 10, adjustY:-4, softFocus:true"));

                 $pic_html .= CHtml::link($img, $link_big, array('class' => 'cloud-zoom-gallery',
                                                                   'rel'=>"useZoom: 'zoom1', smallImage: '".$link."'"));
                $i++;
            }

            return $pic_html;
        }
        else return '';
    }
}