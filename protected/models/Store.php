<?php

/**
 * This is the model class for table "store".
 *
 * The followings are the available columns in table 'store':
 * @property integer $store_id
 * @property integer $user_id
 * @property integer $question_id
 * @property string $store_date
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Question $question
 */
class Store extends CActiveRecord
{
    public function getNewId(){
        $stores = Store::model()->findAll();
        foreach ($stores as $s) {
            $ids[]=$s->store_id;
        }
        if(count($stores) == 0){
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
		return 'store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store_id, user_id, question_id', 'required'),
			array('store_id, user_id, question_id', 'numerical', 'integerOnly'=>true),
			array('store_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('store_id, user_id, question_id, store_date', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'store_id' => 'Store',
			'user_id' => 'User',
			'question_id' => 'Question',
			'store_date' => 'Store Date',
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

		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('store_date',$this->store_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Store the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
