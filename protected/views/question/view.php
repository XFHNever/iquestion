<?php
$this->breadcrumbs=array(
	'Question'=>array('index'),
	$model->question_id,
);
$answer_num=0;
$view_num=0;
$vote_num=0;
if(isset($model->view_num)){
    $view_num=$model->view_num;
}
if(isset($model->answers)){
    $answer_num=  count($model->answers);
}

$user_id = Yii::app()->user->id;
?>


<div class="zu-main-content-inner">
    
    <?php if((!Yii::app()->user->isGuest)&&QuestionController::isStore($model->question_id,Yii::app()->user->id)) { ?>
    
    <div style="float: right; margin-bottom: 30px;margin-right: 50px;">
        <a type="button" class="zu-top-add-question" id="zu-top-add-question"  style=" disabled:disabled; margin-left: 10px; margin-top: 7px; color: red;background:#00ccff; ">已关注</a>
    </div>
    <?php }else {?>
    <div style="float: right; margin-bottom: 30px;margin-right: 50px;">
        <a type="button" href="<?php echo $this->createUrl('question/store',array('id'=>$model->question_id)) ?>" class="zu-top-add-question" id="zu-top-add-question" style=" disabled:disabled;margin-left: 10px; margin-top: 7px; color: white; ">关注它</a>
    </div>
    <?php }?>
     <div id="questions">
         <div class="question-summary" id="question-summary">
                <div class="statscontainer">
                           <div class="statsarrow"></div>
                                   <div class="stats">
                                           <div class="vote">
                                                   <div class="votes">
                                                           <span class="vote-count-post "><strong><?php echo CHtml::encode($view_num); ?></strong></span>
                                                           <div class="viewcount">votes</div>
                                                   </div>
                                           </div>
                                           <div class="status answered">
                                                   <strong><?php echo CHtml::encode($answer_num); ?></strong>
                                                   answers
                                           </div>
                                     
                                   </div>
                   </div>

               <div class="summary">        
                           <div class="bounty-indicator" title="this question has an open bounty worth 150 reputation">+<?php echo CHtml::encode($model->award_point); ?></div>
                           <h3 style="text-align: left; font-weight: bold; ">
                           <?php echo CHtml::encode($model->question_title); ?>
                           </h3>
                                   <div style="text-align: left;" class="excerpt">
                                           <?php echo CHtml::encode($model->question_content); ?>
                                   </div>

                                   <div class="tags t-amazon-web-services t-amazon-s3 t-amazon t-policy t-bucket">
                                       <div class="post-tag">

                                            <?php echo CHtml::link(CHtml::encode($model->tag->tag_name), $model->getTagUrl()); ?>
                                       </div>

                                   </div>
                                   <div class="started fr">
                                        <div class="user-info ">
                                                   <div style="text-align: left;" class="user-action-time">
                                                                           asked <span  class="relativetime"><?php echo CHtml::encode($model->question_date); ?></span>
                                                   </div>
                                                   <div style="text-align: left;" class="user-gravatar32">
                                                       <a href=""><div class=""><img src="<?php echo CHtml::encode($model->user->user_icon); ?>" alt="" width="32" height="32"></div></a>
                                                   </div>
                                                   <div style="text-align: left;" class="user-details">
                                                           <?php echo CHtml::link(CHtml::encode($model->user->user_name), $model->getUserUrl()); ?>
                                                           <br>
                                                           <span class="reputation-score" title="reputation score" dir="ltr"><?php echo CHtml::encode($model->user->user_point); ?></span>
                                                   </div>
                                      </div>

                               </div>  
                 </div>
         </div>
         
         <P>下面是回复哟~</P>
          <!-- 回复 -->
	 <div class="question-summary" id="question-answer">
             <?php foreach($model->answers as $answer){?>
                  
                    <?php if($answer->answer_state==1){ ?>
                    <div>
                        <div class="line" style="float: left;margin-left: 10px; ">
                            <a type="button" class="zu-top-add-question" id="zu-top-add-question" style=" width: 90px;color: black; background:#ff33ff;">最优答案！！</a>  
                      </div>
                    </div>
                    <?php }?>
             <div class=" bd answer-first answer-fold" >
                    <div class="line">
                            <!--回复的人和时间-->
                            <div class="line info f-aid">
                                        <span class="grid-r pos-time"> 
                                                <ins class="accuse-area" alog-alias="qb-accuse-link" style="display: none; "></ins>
                                                <?php echo CHtml::encode($answer->answer_date); ?>
                                        </span>
                                <div class="user-info">
                                     <?php echo CHtml::link(CHtml::encode($answer->getUserName()), $answer->getUserUrl()); ?>
                                </div>

                                </div>
                                <!--回复的正文-->
                                <div class="line content">
                                    <!--回复正文-->
                                    <pre accuse="aContent"  class="answer-text mb-10" style="margin-top:10px;">
                                        <?php echo CHtml::encode($answer->answer_content); ?>         
                                    </pre>
                                    
                 <?php if(($model->user_id == $user_id)&&($model->question_state == 0)){ ?>
                    <div class="line" style="float: left;margin-left: 10px; margin-top: -10px; ">
                      <a type="button" class="zu-top-add-question" id="zu-top-add-question" href="<?php echo $this->createUrl('question/point',array('id'=>$answer->answer_id,)) ?>" style="width: 120px; color: white; ">选为最佳答案</a>  
                    </div>
                <?php }?>
                                    
                                        <!--评论和点赞等-->
                                        <div class="grid-r f-aid ">
                                            <!--评论-->
                                           
                                            <span alog-action="qb-comment-btn" class="comment f-blue" id="comment-1072832204">评论(<?php echo CHtml::encode(count($answer->comments)); ?>)</span>
                                                     <span class="f-pipe">|</span>
                                                     <!--赞-->
                                                     <a stats="NF_24031577829_701_276185229" href="<?php echo  $this->createUrl('question/vote', array(
			'id'=>$answer->answer_id,)) ?>" class="ilike_icon" onclick="/">赞(<?php echo CHtml::encode($answer->vote_num); ?>)</a>
                                        </div>
                                </div>

                        </div>

              </div>

              <?php } ?>
         </div>
          <?php if($model->question_state == 0){?>
         <!--回复框-->
         <div class="question-summary" style="margin-top: 30px;">
               <?php  echo CHtml::beginForm($this->createUrl('question/addAnswer', array(
			'id'=>$model->question_id,
		)), "post",array('id'=>'contentsearch')) ?>   
                    <div  style=" height:200px; width:700px; visibility:visible; ">

                       <?php //'t.parent_id !=:parent',array('parent'=>0)
                           echo CHtml::textArea("answer_content","我要解答...", array(
                               'name'=>'answer_content',
                               'style'=>"color: #999;height:100%;width:100%;",
                               'onclick'=>"this.value=''",
                               'onkeydown'=>"this.style.color = '#000000'"
                               ));

                       ?>
                    </div>  
                   

                    <button  class="zu-top-add-question" id="zu-top-add-question" style="margin-top: 10px;margin-right: 30px;float: right;">提交解答</button>
                    <?php  echo CHtml::endForm(); ?> 
        </div>
          <?php }else {?>
         <p style="margin-top: 10px;">该问题已经解决啦~哈哈！！</p>
          <?php }?>
     </div>
 </div>