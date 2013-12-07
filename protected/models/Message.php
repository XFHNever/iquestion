<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property integer $message_id
 * @property integer $user_id
 * @property integer $leave_user_id
 * @property string $message_content
 * @property string $message_date
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Message extends CActiveRecord
{
    public function getNewId(){
        $messages = Message::model()->findAll();
        foreach ($messages as $m) {
            $ids[]=$m->message_id;
        }
       if(count($messages) == 0){
            return 1;
        }else{
            return max($ids)+1;
        }
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message_id, user_id, leave_user_id', 'required'),
			array('message_id, user_id, leave_user_id', 'numerical', 'integerOnly'=>true),
			array('message_content', 'length', 'max'=>400),
			array('message_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('message_id, user_id, leave_user_id, message_content, message_date', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'message_id' => 'Message',
			'user_id' => 'User',
			'leave_user_id' => 'Leave User',
			'message_content' => 'Message Content',
			'message_date' => 'Message Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('message_id',$this->message_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('leave_user_id',$this->leave_user_id);
		$criteria->compare('message_content',$this->message_content,true);
		$criteria->compare('message_date',$this->message_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Message the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
