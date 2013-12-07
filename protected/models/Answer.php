<?php

/**
 * This is the model class for table "answer".
 *
 * The followings are the available columns in table 'answer':
 * @property integer $answer_id
 * @property integer $question_id
 * @property integer $user_id
 * @property string $answer_content
 * @property string $answer_date
 * @property integer $vote_num
 *
 * The followings are the available model relations:
 * @property Question $question
 * @property Comment[] $comments
 */
class Answer extends CActiveRecord
{
    public function getNewId(){
        $answers = Answer::model()->findAll();
        foreach ($answers as $q) {
            $ids[]=$q->answer_id;
        }
        if(count($answers) == 0){
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
		return 'answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer_id, question_id, user_id', 'required'),
			array('answer_id, question_id, user_id, vote_num', 'numerical', 'integerOnly'=>true),
			array('answer_content', 'length', 'max'=>400),
			array('answer_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('answer_id, question_id, user_id, answer_content, answer_date, vote_num', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
			'comments' => array(self::HAS_MANY, 'Comment', 'answer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'answer_id' => 'Answer',
			'question_id' => 'Question',
			'user_id' => 'User',
			'answer_content' => 'Answer Content',
			'answer_date' => 'Answer Date',
			'vote_num' => 'Vote Num',
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

		$criteria->compare('answer_id',$this->answer_id);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('answer_content',$this->answer_content,true);
		$criteria->compare('answer_date',$this->answer_date,true);
		$criteria->compare('vote_num',$this->vote_num);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
       public function getUserUrl(){
            return Yii::app()->createUrl('user/index', array(
			'id'=>$this->user_id,
	    ));
        }
        
        public function getUserName(){ 
            $user = User::model()->findByPk($this->user_id);
            if(isset($user)){
               return $user->user_name;
            }else{ 
                return "不晓得是谁。";
            }
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Answer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
