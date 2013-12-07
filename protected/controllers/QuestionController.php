<?php

class QuestionController extends Controller
{
        public $year_hot;
        public $week_hot;
        public $month_hot;
        public $point_hot;
        static $num=5;
        
     
        
        
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        private $critria;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','search','hot'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','addAnswer','vote','store','point'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionPoint($id){
     
            
            $answer = Answer::model()->findByPk($id);
            $question = Question::model()->findByPk($answer->question_id);
            $leave_user = User::model()->findByPk($answer->user_id);
            $user = User::model()->findByPk($question->user_id);
            $answer->answer_state = 1;
            $question->question_state = 1;
            $user->user_point -= $question->award_point;
            $leave_user->user_point += $question->award_point;
            
            if($answer->save() && $question->save() && $user->save() && $leave_user->save()){
                $this->redirect(array('view','id'=>$answer->question_id));
            }
        }


        public static function isStore($id,$user_id=1){
            
              
            $isExist = false;
            
            $criteria1 = new CDbCriteria();
            $criteria1->addCondition('user_id='.$user_id);
            $stores = Store::model()->findAll($criteria1);
            
            foreach ($stores as $store) {
                if($store->question_id == $id){
                    $isExist = TRUE;
                    break;
                }
            }
            return $isExist;
        }
        
        public function actionStore($id){
            if(Yii::app()->user->isGuest){
                $this->redirect(array('user/login')); 
            }
            $store = new Store;
            $user_id = Yii::app()->user->id;
             
            if(!$this->isStore($id,$user_id)){
                $store->question_id = $id;
                $store->store_date = date('Y-m-d H:i:s',time());
                $store->store_id = Store::model()->getNewId();
                $store->user_id = $user_id;
                if($store->save()){
                    $this->redirect(array('view','id'=>$id));
                }
            }
            $this->redirect(array('view','id'=>$id));
  
        }

        public function actionHot(){
            $nowTime = time();
            $criteria1 = new CDbCriteria();
            $criteria1->limit = 10;
            $criteria1->order = 'view_num DESC,question_date DESC' ;//排序条件 
            $sql1 = 'question_date >='.strtotime(date('Y-m-d H:i:s',($nowTime-7*24*3600))).'';
            $criteria1->addCondition($sql1);
            $this->week_hot = Question::model()->findAll($criteria1);
    //        throw new CHttpException(404, count($this->week_hot));
            
            $criteria2 = new CDbCriteria();
            $criteria2->limit = 10;
            $criteria2->order = 'view_num DESC,question_date DESC' ;//排序条件 
            $sql2 = 'question_date >='.strtotime(date('Y-m-d H:i:s',($nowTime-30*24*3600))).'';
            $criteria2->addCondition($sql2);
            $this->month_hot = Question::model()->findAll($criteria2);
            
            $criteria3 = new CDbCriteria();
            $criteria3->limit = 10;
            $criteria3->order = 'view_num DESC,question_date DESC' ;//排序条件 
            $sql3 = 'question_date >='.strtotime(date('Y-m-d H:i:s',($nowTime-365*24*3600))).'';
            $criteria3->addCondition($sql3);
            $this->year_hot = Question::model()->findAll($criteria3);
            
             $criteria4 = new CDbCriteria();
            $criteria4->limit = 10;
            $criteria4->order = 'award_point DESC,question_date DESC' ;//排序条件 
         //   $criteria4->addCondition($sql4);
            $this->point_hot = Question::model()->findAll($criteria4);
            
            $this->render('hot',array(
	    	'week_hot' => $this->week_hot,
                'month_hot' => $this->month_hot,
                'year_hot' =>  $this->year_hot,
                'point_hot' => $this->point_hot,
            ));
        }


        /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
                
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
        
        
        
        public static function getQuestionQuantity($id){
            $count = 0;
            $user = User::model()->findByPk($id);
            foreach ($user->questions as $question) {
                if(date('Y-m-d',time()) == (date('Y-m-d',  strtotime($question->question_date)))){
                   $count++;
                  
                 }
                //throw new CHttpException(404,'The re'.date('Y-m-d',  strtotime($question->question_date)));
            }
            return $count;
        } 


        public function actionCreate()
	{
            if(Yii::app()->user->isGuest){
                $this->redirect(array('user/login')); 
            }
		$model=new Question;
                $user_id = Yii::app()->user->id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $session = Yii::app()->session;
                
                $user = User::model()->findByPk($user_id);
                
                if(($user->user_point<=10&&$this->getQuestionQuantity($user_id)>=1) || $this->getQuestionQuantity($user_id)>3){
               //     throw new CHttpException(404,'The re'.$this->getQuestionQuantity($user_id).'ddddd');
                    Yii::app()->user->setFlash('Error',"今天你提出的问题数量已经超过系统限制，请明天再来吧");
                    $this->render('create',array('model'=>$model));
                }else{
                    if(isset($_POST['Question']))
                    {

                            $model->attributes=$_POST['Question'];
                            
                         //   throw new CHttpException(404,'The re'.$model->question_title);
                            if($model->question_title == null){
                                Yii::app()->user->setFlash('Error',"不好意思，问题标题不能为空，请重新创建你的问题");
                                $this->render('create',array('model'=>$model));
                            }
                            
                        //    $model->question_content=$_POST['question_content'];
                            $model->question_id= Question::model()->getNewId();

                            $model->question_date = date('Y-m-d H:i:s',time());
    //                        $model->user_id =  Yii::app()->user->id ;
                            $model->user_id = $user_id;
                            $model->tag_id = $_POST['tag'];
                            $model->award_point = $_POST['point'];
                            
                            if($model->award_point>$user->user_point){
                                Yii::app()->user->setFlash('Error',"不好意思，你给出的问题悬赏已经超出你自己的积分，请重新设置");
                                $this->render('create',array('model'=>$model));
                            }
                            $tag = $model->tag;


                            $sessionKey = $model->user_id.'_is_sending';  
                            if(isset($session[$sessionKey])){
                                $first_submit_time = $session[$sessionKey];  
                                $current_time      = time();  
                                if($current_time - $first_submit_time < 10){  
                                    $session[$sessionKey] = $current_time;  
                                    $this->response(array('status'=>1, 'msg'=>'不能在10秒钟内连续发送两次。'));  
                                }else{  
                                    unset($session[$sessionKey]);//超过限制时间，释放session";  
                                }  
                            }       
                            if(!isset($session[$sessionKey])){  
                                $tag->tag_num++;
                                $session[$sessionKey] = time();  
                                if($model->save()){
                                    if($tag->save()){
                                        $this->redirect(array('view','id'=>$model->question_id));    
                                    }

                                }
                            }  


                    }else {
                        $this->render('create',array('model'=>$model));    
                    }
              }
                
                
                
		

		
	}
        
        public function actionAddAnswer($id){
            if(Yii::app()->user->isGuest){
                $this->redirect(array('user/login')); 
            }
            if(isset($_POST['answer_content'])){
                    $this->critria['answer_content']=$_POST['answer_content'];
                }
                if(isset($_GET['keyword'])){
                    $this->critria['answer_content']=$_GET['answer_content'];
            }
            
            
            $answer = new Answer;
            $answer->answer_content = $this->critria['answer_content'];
            $answer->answer_date = date('Y-m-d H:i:s',time());
            $answer->answer_id = Answer::model()->getNewId();
            $answer->question_id = $id;
            $answer->user_id = Yii::app()->user->id;
            $answer->vote_num = 0;
            
            if($answer->save()){

                $this->redirect(array('view','id'=>$id));
            } else {
                $this->redirect(array('view','id'=>$id));
            }
            
        }

          public function actionVote($id){
            if(Yii::app()->user->isGuest){
                $this->redirect(array('user/login')); 
            }
              
            $answer = Answer::model()->findByPk($id);
            
            $answer->vote_num = $answer->vote_num + 1 ;
            			 

            if($answer->save()){
                			
                $this->redirect(array('view','id'=>$answer->question_id));
            } else {
                			
                $this->redirect(array('view','id'=>$answer->question_id));
            }
            
        }
        
        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->question_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Question',array(
                        'pagination' => array(
                          'pageSize' => 4,
                   
                    ),
                    'sort'=>array(
                         'defaultOrder' => 'question_date DESC',
                    ),
                    ));
                $criteria = new CDbCriteria();
                $pages = new CPagination(Question::model()->count($criteria));
                $pages->pageSize=1;
                $pages->applyLimit($criteria);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                        'pages'=> $pages,
		));
	}

        public function actionSearch(){
               
                
                if(isset($_POST['keyword'])){
                    $this->critria['keyword']=$_POST['keyword'];
                }
                if(isset($_GET['keyword'])){
                    $this->critria['keyword']=$_GET['keyword'];
                }
                
                $criteria = new CDbCriteria();
                $criteria->addSearchCondition('question_title',  $this->critria['keyword']);
                $criteria->addSearchCondition('question_content',  $this->critria['keyword'],true,'OR');
                
                $pages = new CPagination(Question::model()->count($criteria));
                $pages->pageSize=1;
                $pages->applyLimit($criteria);
                
                 $dataProvider=new CActiveDataProvider('Question',array(
                  'criteria'=>$criteria,
                  'pagination' => array(
                  'pageSize' => 4,

                ),
                'sort'=>array(
                     'defaultOrder' => 'question_date DESC',
                ),
                ));
                 
               
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                      //  'pages'=> $pages,
		));  
        }

        /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Question('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Question']))
			$model->attributes=$_GET['Question'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Question the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Question::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Question $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
