<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$answer_num=0;
$view_num=0;

?>
 <div id="mainbar-full">
		        <!--标题-->
    <div class="subheader">
            <h1 id="h-hot">Hot Question</h1>
                  <!--标签页-->
            <div id="tabs">
                    <ul class="nav nav-tabs">
                           <li class="active"><a href="#week" data-toggle="tab">Week</a></li>
                           <li><a href="#month" data-toggle="tab">Month</a></li>
                           <li><a href="#year" data-toggle="tab">Year</a></li>
                            <li><a href="#point" data-toggle="tab">积分</a></li>
                    </ul>
            </div>
    </div>
			   
    <!--内容-->

     <div class="tab-content">
            <!--周最热-->
            <div class="tab-pane active" id="week">
                  <div class="hot-list" id="week-list">
                         <!--问题-->
                    <div id="questions">
                      <?php  if(count($this->week_hot) == 0){?>
                          <p>不晓得。。这么没有结果</p>
                      <?php }
                      foreach ($this->week_hot as $question) {
                        if(isset($question->view_num)){
                            $view_num=$question->view_num;
                        }
                        if(isset($question->answers)){
                            $answer_num=  count($question->answers);
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
                                       <div class="bounty-indicator" title="this question has an open bounty worth 150 reputation">+<?php echo CHtml::encode($question->award_point); ?></div>
                                       <h3 style="text-align: left; font-weight: bold; ">
                                       <?php echo CHtml::link(CHtml::encode($question->question_title), $question->getUrl()); ?>
                                       </h3>
                                               <div style="text-align: left;" class="excerpt">
                                                       <?php echo CHtml::encode($question->question_content); ?>
                                               </div>

                                               <div class="tags t-amazon-web-services t-amazon-s3 t-amazon t-policy t-bucket">
                                                   <div class="post-tag">

                                                        <?php echo CHtml::link(CHtml::encode($question->tag->tag_name), $question->getTagUrl()); ?>
                                                   </div>

                                               </div>
                                               <div class="started fr">
                                                    <div class="user-info ">
                                                               <div style="text-align: left;" class="user-action-time">
                                                                                       asked <span  class="relativetime"><?php echo CHtml::encode($question->question_date); ?></span>
                                                               </div>
                                                               <div style="text-align: left;" class="user-gravatar32">
                                                                   <a href=""><div class=""><img src="<?php echo CHtml::encode($question->user->user_icon); ?>" alt="" width="32" height="32"></div></a>
                                                               </div>
                                                               <div style="text-align: left;" class="user-details">
                                                                       <?php echo CHtml::link(CHtml::encode($question->user->user_name), $question->getUserUrl()); ?>
                                                                       <br>
                                                                       <span class="reputation-score" title="reputation score" dir="ltr"><?php echo CHtml::encode($question->user->user_point); ?></span>
                                                               </div>
                                               </div>

                                       </div>  
                               </div>
                        </div>

                      <?php }?>
                 </div>
                               
              </div>
            </div>
				    <!--月最热-->
			       <div class="tab-pane" id="month">
			
                  <div class="hot-list" id="month-list">
                         <!--问题-->
                    <div id="questions">
                      <?php  if(count($this->month_hot) == 0){?>
                          <p>不晓得。。这么没有结果</p>
                      <?php }
                      foreach ($this->month_hot as $question) {
                        if(isset($question->view_num)){
                            $view_num=$question->view_num;
                        }
                        if(isset($question->answers)){
                            $answer_num=  count($question->answers);
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
                                       <div class="bounty-indicator" title="this question has an open bounty worth 150 reputation">+<?php echo CHtml::encode($question->award_point); ?></div>
                                       <h3 style="text-align: left; font-weight: bold; ">
                                       <?php echo CHtml::link(CHtml::encode($question->question_title), $question->getUrl()); ?>
                                       </h3>
                                               <div style="text-align: left;" class="excerpt">
                                                       <?php echo CHtml::encode($question->question_content); ?>
                                               </div>

                                               <div class="tags t-amazon-web-services t-amazon-s3 t-amazon t-policy t-bucket">
                                                   <div class="post-tag">

                                                        <?php echo CHtml::link(CHtml::encode($question->tag->tag_name), $question->getTagUrl()); ?>
                                                   </div>

                                               </div>
                                               <div class="started fr">
                                                    <div class="user-info ">
                                                               <div style="text-align: left;" class="user-action-time">
                                                                                       asked <span  class="relativetime"><?php echo CHtml::encode($question->question_date); ?></span>
                                                               </div>
                                                               <div style="text-align: left;" class="user-gravatar32">
                                                                   <a href=""><div class=""><img src="<?php echo CHtml::encode($question->user->user_icon); ?>" alt="" width="32" height="32"></div></a>
                                                               </div>
                                                               <div style="text-align: left;" class="user-details">
                                                                       <?php echo CHtml::link(CHtml::encode($question->user->user_name), $question->getUserUrl()); ?>
                                                                       <br>
                                                                       <span class="reputation-score" title="reputation score" dir="ltr"><?php echo CHtml::encode($question->user->user_point); ?></span>
                                                               </div>
                                               </div>

                                       </div>  
                               </div>
                        </div>

                      <?php }?>
                 </div>
                               
              </div>
				   </div>
                    <!--年最热-->
               <div class="tab-pane" id="year">
				      
                  <div class="hot-list" id="year-list">
                         <!--问题-->
                    <div id="questions">
                      <?php  if(count($this->year_hot) == 0){?>
                          <p>不晓得。。这么没有结果</p>
                      <?php }
                      foreach ($this->year_hot as $question) {
                        if(isset($question->view_num)){
                            $view_num=$question->view_num;
                        }
                        if(isset($question->answers)){
                            $answer_num=  count($question->answers);
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
                                       <div class="bounty-indicator" title="this question has an open bounty worth 150 reputation">+<?php echo CHtml::encode($question->award_point); ?></div>
                                       <h3 style="text-align: left; font-weight: bold; ">
                                       <?php echo CHtml::link(CHtml::encode($question->question_title), $question->getUrl()); ?>
                                       </h3>
                                               <div style="text-align: left;" class="excerpt">
                                                       <?php echo CHtml::encode($question->question_content); ?>
                                               </div>

                                               <div class="tags t-amazon-web-services t-amazon-s3 t-amazon t-policy t-bucket">
                                                   <div class="post-tag">

                                                        <?php echo CHtml::link(CHtml::encode($question->tag->tag_name), $question->getTagUrl()); ?>
                                                   </div>

                                               </div>
                                               <div class="started fr">
                                                    <div class="user-info ">
                                                               <div style="text-align: left;" class="user-action-time">
                                                                                       asked <span  class="relativetime"><?php echo CHtml::encode($question->question_date); ?></span>
                                                               </div>
                                                               <div style="text-align: left;" class="user-gravatar32">
                                                                   <a href=""><div class=""><img src="<?php echo CHtml::encode($question->user->user_icon); ?>" alt="" width="32" height="32"></div></a>
                                                               </div>
                                                               <div style="text-align: left;" class="user-details">
                                                                       <?php echo CHtml::link(CHtml::encode($question->user->user_name), $question->getUserUrl()); ?>
                                                                       <br>
                                                                       <span class="reputation-score" title="reputation score" dir="ltr"><?php echo CHtml::encode($question->user->user_point); ?></span>
                                                               </div>
                                               </div>

                                       </div>  
                               </div>
                        </div>

                      <?php }?>
                 </div>
                               
              </div>
        </div>
       
                    
                           <!--年最热-->
               <div class="tab-pane" id="point">
				      
                  <div class="hot-list" id="year-list">
                         <!--问题-->
                    <div id="questions">
                      <?php  if(count($this->point_hot) == 0){?>
                          <p>不晓得。。这么没有结果</p>
                      <?php }
                      foreach ($this->point_hot as $question) {
                        if(isset($question->view_num)){
                            $view_num=$question->view_num;
                        }
                        if(isset($question->answers)){
                            $answer_num=  count($question->answers);
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
                                       <div class="bounty-indicator" title="this question has an open bounty worth 150 reputation">+<?php echo CHtml::encode($question->award_point); ?></div>
                                       <h3 style="text-align: left; font-weight: bold; ">
                                       <?php echo CHtml::link(CHtml::encode($question->question_title), $question->getUrl()); ?>
                                       </h3>
                                               <div style="text-align: left;" class="excerpt">
                                                       <?php echo CHtml::encode($question->question_content); ?>
                                               </div>

                                               <div class="tags t-amazon-web-services t-amazon-s3 t-amazon t-policy t-bucket">
                                                   <div class="post-tag">

                                                        <?php echo CHtml::link(CHtml::encode($question->tag->tag_name), $question->getTagUrl()); ?>
                                                   </div>

                                               </div>
                                               <div class="started fr">
                                                    <div class="user-info ">
                                                               <div style="text-align: left;" class="user-action-time">
                                                                                       asked <span  class="relativetime"><?php echo CHtml::encode($question->question_date); ?></span>
                                                               </div>
                                                               <div style="text-align: left;" class="user-gravatar32">
                                                                   <a href=""><div class=""><img src="<?php echo CHtml::encode($question->user->user_icon); ?>" alt="" width="32" height="32"></div></a>
                                                               </div>
                                                               <div style="text-align: left;" class="user-details">
                                                                       <?php echo CHtml::link(CHtml::encode($question->user->user_name), $question->getUserUrl()); ?>
                                                                       <br>
                                                                       <span class="reputation-score" title="reputation score" dir="ltr"><?php echo CHtml::encode($question->user->user_point); ?></span>
                                                               </div>
                                               </div>

                                       </div>  
                               </div>
                        </div>

                      <?php }?>
                 </div>
                               
              </div>
        </div>
</div>



 <script>
            $(function () {
                var log = function(s){
                    window.console && console.log(s)
                }
                $('.nav-tabs a:last').tab('show')
                $('a[data-toggle="tab"]').on('show', function (e) {
                    log(e)
                })
                $('a[data-toggle="tab"]').on('shown', function (e) {
                    log(e.target) // activated tab
                    log(e.relatedTarget) // previous tab
                })
            })
        </script>