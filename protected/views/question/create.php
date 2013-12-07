<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
);

?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ask_question',
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
)); ?>

<div style="color: red;margin-left: 250px;">
    <?php echo Yii::app()->user->getFlash('Error');?>    
</div>

<section class="ask-main" style>
    <section class="ask-left grid" style>
            <div  class="wgt-title-area">
                     <div class="clearfix">
                               <div class="grid f-gray f-yahei title-intro"><i></i>   一句话描述您的疑问  </div>
                     </div>
                     <div class="title-area-outter clearfix"> 
                             <?php echo $form->textField($model,'question_title',array('size'=>25,'maxlength'=>45,'style'=>'width:100%; height:30px;;','placeholder'=>'请在这里概述您的问题',)); ?>
		             <?php echo $form->error($model,'question_title'); ?>
                             				                    

                    </div>
            </div>
            <!--问题详细内容-->
            <h4 class="f-gray mt-10 mb-10">问题补充<span class="f-12 detail-note">(选填)</span></h4>
            <div id="ask-editor">
                <div name="question-content" style=" height:250px; width:700px; visibility:visible; ">
                    


                    
                    
                   <?php echo $form->textArea($model,'question_content',array('style'=>'width:100%;height:100%;'));?>
                                  
                  
                    <?php
 // echo $form->textArea($model,'question_content',array('style'=>'width:100%;height:100%;',));
                    ?>
                    <?php //echo $form->error($model,'question_content');
                    ?>
                  
                </div>
                  
            </div>

            <!-- 添加标签和积分 -->
            <div class="wgt-other-bar clearfix" id="other-bar">
                 <div id="category-bar" class="grid f-simsun"><span class="selector">选择分类</span></div>
                 <div>
                     <?php 
                        //找出所有分类gorupby上级分类：
                        $model=  Tag::model()->findAll();

                        //生成listData 
                        $list=CHtml::listData($model,'tag_id',      // actual values
                                        'tag_name' );
                        echo('   ');
                        echo CHtml::dropDownList('tag','选择分类',$list ); 
                    ?>
                     
                     <span id="wealth-bar" class="grid-r" > 
                    <?php 
                        $list=CHtml::listData($model,'tag_id',      
                                        'tag_name' );
                        echo('   ');
                        echo CHtml::dropDownList('point','悬赏积分',array(0=>"悬赏0",5=>"悬赏5",10=>"悬赏10",
                            15=>"悬赏15",20=>"悬赏20",30=>"悬赏30",50=>"悬赏50",80=>"悬赏80",100=>"悬赏100")); 
                    ?> 
                             
                </span> 
                 </div>
                
            </div> 

 
            <div class="wgt-submit">
                 <div id="normail-submit-panel">
                         <div class="clearfix" id="submit-panel"> 
                                     <div id="ik-authcode-outer" style="display: none;"></div> 
                                     <div id="submit-btn" class="btn btn-32-green grid-r submit-btn">
                                         <?php echo CHtml::submitButton('提交问题',array('style'=>'width:100%;height:100%;background:#45AD00;',)); ?>
                                     </div>
                             </div>
                     </div>
            </div>

    </section>
</section>     
<?php $this->endWidget(); ?>


                  <?php //'t.parent_id !=:parent',array('parent'=>0)
                                      //             echo $form->textArea($model,"question_content", array(
                                                    //   'name'=>'question_content',
                                                      // 'style'=>"color: #999;height:100%;width:100%;",
                                                      // 'onclick'=>"this.value=''",
                                                      // 'onkeydown'=>"this.style.color = '#000000'"
                                                      // ));

                                               ?>