<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_password
 * @property integer $user_point
 * @property string $user_email
 * @property string $user_icon
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property Message[] $messages
 * @property Question[] $questions
 * @property Store[] $stores
 */
class User extends CActiveRecord
{
      
       
       public function getNewId(){
        $users = User::model()->findAll();
        foreach ($users as $u) {
            $ids[]=$u->user_id;
        }
        
        if(count($users) == 0){
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
                       array('user_email', 'required'),
                    array('user_name', 'required'),
                    array('user_password', 'required'),
                        array('user_name','unique'),
//                        array('user_password', 'compare', 'compareAttribute'=>'password_repeat' ,'on'=>'forgot'),
			array('user_id, user_point', 'numerical', 'integerOnly'=>true),
			array('user_name, user_password, user_email, user_icon', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_name, user_password, user_point, user_email, user_icon', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
                        'answers' => array(self::HAS_MANY, 'Answer', 'user_id'),
			'messages' => array(self::HAS_MANY, 'Message', 'user_id'),
			'questions' => array(self::HAS_MANY, 'Question', 'user_id'),
			'stores' => array(self::HAS_MANY, 'Store', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User ID',
			'user_name' => 'User Name',
			'user_password' => 'User Password',
			'user_point' => 'User Point',
			'user_email' => 'User Email',
			'user_icon' => 'User Icon',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_point',$this->user_point);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_icon',$this->user_icon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        public function getTags(){
            return $this->comments->answer->question->tag;
        }

        public function getUserUrl()
	{
		return Yii::app()->createUrl('user/view', array(
			'id'=>$this->user_id,
			'title'=>$this->user_name,
		));
	}
        /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validatePassword($password)
        {
             return $password===$this->user_password; 
        }
        

}
