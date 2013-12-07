<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id=>array('view','id'=>$model->user_id),
	'Update',
);
?>

 <!--左半侧-->
	        <div class="side">
			   <h2 style=" padding-bottom:10px; margin-bottom:20px; font-size:16px; color:#0099CC"><p>个人设置:</p></h2>
			     <!-- 导航条-->
			   <div class="menu">
			        <ul class="nav nav-pills" id="myTab">
						  <li class="active"><a href="#modify-card"  data-toggle="pill">基本资料</a></li>
						  <li><a href="#modify-photo" data-toggle="pill">头像设置</a></li>
					</ul>
					
			   </div> 
		    </div>
			<!--右半侧-->
			 <div class="tab-content">
			   <!--修改基本资料-->
			    <div class="tab-pane active" id="modify-card">
					<div class="personal-right">
						  <div class="my-question">
						     <h2 class="personal-home-title">基本资料</h2>
						       <div class="grid-16-8 clearfix">
								   <div class="article">
									       <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'register-form',
                                    'enableAjaxValidation'=>true,
                           )); ?>
                       
                         <div name="lzform">
                             
                                   
                                <div class="item extra-tips">
                                   <label>名&nbsp;&nbsp;号</label>
                                   <?php echo $form->textField($model,'user_name',array('size'=>50,'maxlength'=>60,'class'=>'basic-input',)); ?>
                                   <?php echo $form->error($model,'user_name'); ?>
                                        
                                </div>
                          
                                <div class="item extra-tips">
                                        <label>邮&nbsp;&nbsp;箱</label>
                                        <?php echo $form->textField($model,'user_email',array('size'=>50,'maxlength'=>60,'class'=>'basic-input',)); ?>
                                        <?php echo $form->error($model,'user_email'); ?>
                                </div>
                                <div class="suggestion">
                                        <div id="email_suggestion"></div>
                                </div>
                                <div class="item extra-tips">
                                        <label>密&nbsp;&nbsp;码</label>
                                        <?php echo $form->textField($model,'user_password',array('size'=>50,'maxlength'=>60,'class'=>'basic-input',)); ?>
                                        <?php echo $form->error($model,'user_password'); ?>
                                       
                                </div>
                        


                                <div class="item-submit">
                                        <label>&nbsp;</label>
                                        <?php echo CHtml::submitButton('修改',array('class'=>'btn-submit disabled')); ?>
                                        
                                </div>
                         </div>
                        <?php $this->endWidget(); ?>
							
								   </div>
							  </div>
						  </div>
					</div>
				</div>
				<!--修改头像-->
				<div class="tab-pane" id="modify-photo">
					<div class="personal-right">
						  <div class="my-question">
						      <h2 class="personal-home-title">头像设置</h2>
                                                    <?php $form=$this->beginWidget('CActiveForm', array(  
                                                    'id'=>'user-form',  
                                                    'enableAjaxValidation'=>false,  
                                                    'htmlOptions'=>array('enctype'=>'multipart/form-data'),  
                                                    )); ?>
                                                      

  
                                                    <div class="fav_list">
                                                        <div style="width:250px; height:250px; border:1px solid #000000">
                                                             <?php echo '<img src="http://localhost/../'.$model->user_icon.'" style="width:250px; height:250px;" />'; ?>
                                                        </div>
                                                            
                                                            
                                                                 <div style="margin-top:10px; width:250px">
                                                                      <?php echo CHtml::submitButton('保存图像',array('class'=>'btn btn-lg btn-primary btn-block','style'=>'width:100px;float:left; margin-right:10px')); ?>
                                                                     <div   style=" width:100px;float:right; margin-left:10px">
                                                                   
                                                                         
                                                                        <?php echo CHtml::activeFileField($model,'user_icon'); ?>  
                                                                        <?php echo $form->error($model,'user_icon'); ?>  
                                                                     </div>
                                                                     
                                                                      
                                                                 </div>

                                                        </div>
                                                      <?php $this->endWidget(); ?>
						  </div>
					</div>
				</div>
			</div>	
