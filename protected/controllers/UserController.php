<?php

class UserController extends Controller
{      
        private $users;  
        private $critria;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        
       
        
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
				'actions'=>array('index','view','search','addMessage','login','logout','register','update'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionLogin(){
            $model=new LoginForm;
            // if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
                                  $this->redirect(Yii::app()->user->returnUrl);
                      
		}
		// display the login form
		$this->render('login',array('model'=>$model));
        }
        
          public function actionLogout()
	{ 
            Yii::app()->user->logout(false);
            $this->redirect(Yii::app()->homeUrl);
	}
        
        


        public function actionAddMessage($id){
            if(Yii::app()->user->isGuest){
                $this->redirect(array('user/login')); 
            }
            $message_content;
            if(isset($_POST['add_message'])){
                    $message_content=$_POST['add_message'];
            }
            
            
            $message = new Message;
            $message->message_content = $message_content;
            $message->message_date = date('Y-m-d H:i:s',time());
            $message->message_id = Message::model()->getNewId();
            $message->user_id = $id;
            $message->leave_user_id = Yii::app()->user->id;;
            
            
            if($message->save()){

                $this->redirect(array('view','id'=>$id));
            } else {
                $this->redirect(array('view','id'=>$id));
            }
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
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionRegister()
        {
            
             $model=new User;
           // ajax validator
            if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
                        {
                                echo CActiveForm::validate(array($model,$model));
                                Yii::app()->end();
                        }

                if(isset($_POST['User']))
                {
                        // 收集用户输入的数据
                        $model->attributes=$_POST['User'];
                        $model->user_id = User::model()->getNewId();
                        //    验证用户输入，并在判断输入正确后保存数据，并重定向到前一页
                         if($model->validate())
                           {
                              
                             // save user registration
                                if ($model->save()) {
                                       $this->redirect(array('user/login')); 
                                    }
                           }
                    
                }
                $this->render('register',array('model'=>$model));
//                $model = new User;
//              
//                
//                $model->user_id = User::model()->getNewId(); 
//                
//                if(isset($_POST['User'])) {
//                        $model->attributes = $_POST['User'];
//                        $model->validate();
//                        //$model->getErrors();
//                        if($model->save()) {
//                                $this->redirect(array('user/login'));
//                        }
//                }
//                $this->render('register', array('model' => $model));
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

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
                        
                        $image = CUploadedFile::getInstance($model, 'user_icon');  
                        if( is_object($image) && get_class($image) === 'CUploadedFile' ){  
                            $model->user_icon ='images/'. $model->user_name.'.jpg';  
                        }else{  
                            $model->avatar = 'images/icon.jpg';  
                        }  
                        
			if($model->save()){
                             if(is_object($image) && get_class($image) === 'CUploadedFile'){  
                                 $image->saveAs(Yii::app()->basePath.'/../'.$model->user_icon);  
                             }  
                             
                             $this->redirect(array('view','id'=>$model->user_id));
                        }
                            
				
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
//		$dataProvider=new CActiveDataProvider('User',array(
//                    'pagination'=>array(
//                    //所以关于pagination的设置都可以在这里进行
//                    'pagesize'=>1, 
//                    ),
//                    'sort'=>array(
//                         'defaultOrder' => 'user_point DESC',
//                    ),
//                ));
                
                
                $criteria = new CDbCriteria();
                $criteria->order='user_point DESC';
                $pages = new CPagination(User::model()->count($criteria));
                $pages->pageSize=4;
                $pages->applyLimit($criteria);
                $this->users=  User::model()->findAll($criteria);
         
		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
                        'users'=> $this->users,
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
                $criteria->addSearchCondition('user_name',  $this->critria['keyword']);
                $criteria->addSearchCondition('user_id',  $this->critria['keyword'],true,'OR');
                $criteria->order='user_point DESC';
                $pages = new CPagination(User::model()->count($criteria));
                $pages->pageSize=20;
                $pages->applyLimit($criteria);
                
                
                $this->users=  User::model()->findAll($criteria);
         
		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
                        'users'=> $this->users,
                        'pages'=> $pages,
		));
                  
        }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
