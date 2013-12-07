<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $question_id
 * @property integer $user_id
 * @property integer $tag_id
 * @property string $question_title
 * @property string $question_content
 * @property string $question_date
 * @property integer $view_num
 * @property integer $award_point
 *
 * The followings are the available model relations:
 * @property Answer[] $answers
 * @property User $user
 * @property Tag $tag
 * @property Store[] $stores
 */
class Question extends CActiveRecord
{

    public function getNewId(){
        $questions = Question::model()->findAll();
        foreach ($questions as $q) {
            $ids[]=$q->question_id;
        }
        if(count($questions) == 0){
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
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id, user_id, tag_id', 'required'),
			array('question_id, user_id, tag_id, view_num, award_point', 'numerical', 'integerOnly'=>true),
			array('question_title', 'length', 'max'=>45),
			array('question_content', 'length', 'max'=>400),
			array('question_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('question_id, user_id, tag_id, question_title, question_content, question_date, view_num, award_point', 'safe', 'on'=>'search'),
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
			'answers' => array(self::HAS_MANY, 'Answer', 'question_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'tag' => array(self::BELONGS_TO, 'Tag', 'tag_id'),
			'stores' => array(self::HAS_MANY, 'Store', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'question_id' => 'Question',
			'user_id' => 'User',
			'tag_id' => 'Tag',
			'question_title' => 'Question Title',
			'question_content' => 'Question Content',
			'question_date' => 'Question Date',
			'view_num' => 'View Num',
			'award_point' => 'Award Point',
		);
	}
        
        public function getUrl()
	{
		return Yii::app()->createUrl('question/view', array(
			'id'=>$this->question_id,
			'title'=>$this->question_title,
		));
	}
        
       public function getUserUrl()
	{
		return Yii::app()->createUrl('user/view', array(
			'id'=>$this->user->user_id,
			'title'=>$this->user->user_name,
		));
	}
        
        public function getTagUrl()
	{
		return Yii::app()->createUrl('tag/view', array(
			'id'=>$this->tag->tag_id,
			'title'=>$this->tag->tag_name,
		));
	}
        
        public function getQuestionUrl()
	{
		return Yii::app()->createUrl('question/view', array(
			'id'=>$this->question_id,
		));
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

		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('tag_id',$this->tag_id);
		$criteria->compare('question_title',$this->question_title,true);
		$criteria->compare('question_content',$this->question_content,true);
		$criteria->compare('question_date',$this->question_date,true);
		$criteria->compare('view_num',$this->view_num);
		$criteria->compare('award_point',$this->award_point);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
