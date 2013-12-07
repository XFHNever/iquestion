<?php
/* @var $this QuestionController */
/* @var $data Question */
$answer_num=0;
$view_num=0;
if(isset($data->view_num)){
    $view_num=$data->view_num;
}
if(isset($data->answers)){
    $answer_num=  count($data->answers);
}
?>

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
               <div class="bounty-indicator" title="this question has an open bounty worth 150 reputation">+<?php echo CHtml::encode($data->award_point); ?></div>
               <h3 style="text-align: left; font-weight: bold; ">
               <?php echo CHtml::link(CHtml::encode($data->question_title), $data->getUrl()); ?>
               </h3>
                       <div style="text-align: left;" class="excerpt">
                               <?php echo CHtml::encode($data->question_content); ?>
                       </div>

                       <div class="tags t-amazon-web-services t-amazon-s3 t-amazon t-policy t-bucket">
                           <div class="post-tag">
                               
                                <?php echo CHtml::link(CHtml::encode($data->tag->tag_name), $data->getTagUrl()); ?>
                           </div>

                       </div>
                       <div class="started fr">
                            <div class="user-info ">
                                       <div style="text-align: left;" class="user-action-time">
                                                               asked <span  class="relativetime"><?php echo CHtml::encode($data->question_date); ?></span>
                                       </div>
                                       <div style="text-align: left;" class="user-gravatar32">
                                           <a href=""><div class=""><img src="<?php echo CHtml::encode($data->user->user_icon); ?>" alt="" width="32" height="32"></div></a>
                                       </div>
                                       <div style="text-align: left;" class="user-details">
                                               <?php echo CHtml::link(CHtml::encode($data->user->user_name), $data->getUserUrl()); ?>
                                               <br>
                                               <span class="reputation-score" title="reputation score" dir="ltr"><?php echo CHtml::encode($data->user->user_point); ?></span>
                                       </div>
                       </div>

               </div>  
       </div>
</div>
