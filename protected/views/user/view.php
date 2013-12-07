<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id,
);
?>
  <!--左半侧-->
<div class="side">
   <!--头像-->
     <div class="head_id">
                <dl>
                <dt><a href="/njuxfh"><img src="<?php echo CHtml::encode($model->user_icon); ?>" alt="user name"></a></dt>
                        <dd><a href="/njuxfh" class="u_name user_name"><?php echo CHtml::encode($model->user_name); ?></a></dd>
                        <dd><a href="<?php echo $this->createUrl('/user/update',array('id'=>$model->user_id,));?>" class="edit_head" >编辑头像</a>
                                <a href="<?php echo $this->createUrl('/user/update',array('id'=>$model->user_id,));?>" class="edit_info">修改资料</a>
                        </dd>
                </dl>
        </div>
   <!-- 导航条-->
   <div class="menu">
        <ul class="nav nav-pills" id="myTab">
                          <li class="active"><a href="#my-card"  data-toggle="pill">我的资料</a></li>
                          <li><a href="#my-questions" data-toggle="pill">我的提问</a></li>
                          <li><a href="#my-stores" data-toggle="pill">我的关注</a></li>
                          <li><a href="#my-answer" data-toggle="pill" >我的解答</a></li>
                          <li><a href="#my-comment" data-toggle="pill">我的评论</a></li>
                      <li><a href="#my-leave" data-toggle="pill">留言板</a></li>
                </ul>

   </div> 

</div>

<!--右半侧-->

 <div class="tab-content">
    <!--我的资料-->
     <div class="tab-pane active" id="my-card">
                          <div class="personal-right">
                           <div class="my-question" id="my-question">
                                   <h2 class="personal-home-title">我的资料</h2>
                                   <div class="mod-profile">  
                                            <a href="<?php echo $this->createUrl('/user/update',array('id'=>$model->user_id,));?>" class="edit-btn">编辑资料</a>
                                            <div class="split-line-top"></div>  
                                                    <dl class="userdetail-profile-basic">    
                                                            <dt>基本资料 </dt>
                                                            <dd>
                                                                    <span class="profile-attr">昵称</span> 
                                                                    <span class="profile-cnt"><?php echo CHtml::encode($model->user_name); ?></span>       
                                                            </dd>
                                                            <dt></dt>
                                                                <dd>
                                                                    <span class="profile-attr">邮箱</span> 
                                                                    <span class="profile-cnt"><?php echo CHtml::encode($model->user_email); ?></span>       
                                                            </dd>
                                                            <dt></dt>
                                                            <dd>
                                                                    <span class="profile-attr">积分</span> 
                                                                    <span class="profile-cnt"><?php echo CHtml::encode($model->user_point); ?></span>       
                                                            </dd>
                                                    </dl>                             
                                    </div>
                           </div>

                 </div>     
         </div>

         <!--我的问题-->
         <div class="tab-pane" id="my-questions">
                         <div class="personal-right">
                           <div class="my-question">
                                    <h2 class="personal-home-title">我的问题</h2>
                                    <div class="fav_list">
                                        <?php if(count($model->questions)==0){?>
                                            <p>您还没有提出过问题，快点去提问吧~</p>
                                        <?php }?>
                                        
                                    <?php   foreach ($model->questions as $question) { ?>
                                            <dl>
                                                    <!--标题-->
                                                    <dt>
                                                    <span class="time"><?php echo CHtml::encode($question->question_date); ?></span>
                                                                 <span class="title">
                                                                 <?php echo CHtml::link(CHtml::encode($question->question_title),$question->getQuestionUrl()); ?>
                                                                 </span>
                                                    </dt>
                                                    <!--标签-->
                                                    <dd>
                                                            <strong>标签：</strong>
                                                           
                                                            <div class="post-tag">
                                                                <?php echo CHtml::link(CHtml::encode($question->tag->tag_name),$question->getTagUrl()); ?>
                                                            </div>
                                                        
                                                    </dd>
                                            </dl>
                                    <?php } ?>  
                                    </div>
                           </div>
                 </div>	
         </div>
         
         <!--我的关注-->
         <div class="tab-pane" id="my-stores">
                         <div class="personal-right">
                           <div class="my-question">
                                    <h2 class="personal-home-title">我的关注</h2>
                                    <div class="fav_list">
                                        <?php if(count($model->stores)==0){?>
                                            <p>您还没有关注过问题，快点去逛逛吧~</p>
                                        <?php }?>
                                        
                                    <?php   foreach ($model->stores as $store) { 
                                        $question = Question::model()->findByPk($store->question_id);
                                        ?>
                                            <dl>
                                                    <!--标题-->
                                                    <dt>
                                                    <span class="time"><?php echo CHtml::encode($store->store_date); ?></span>
                                                                 <span class="title">
                                                                 <?php echo CHtml::link(CHtml::encode($question->question_title),$question->getQuestionUrl()); ?>
                                                                 </span>
                                                    </dt>
                                                    <!--标签-->
                                                    <dd>
                                                            <strong>标签：</strong>
                                                           
                                                            <div class="post-tag">
                                                                <?php echo CHtml::link(CHtml::encode($question->tag->tag_name),$question->getTagUrl()); ?>
                                                            </div>
                                                        
                                                    </dd>
                                            </dl>
                                    <?php } ?>  
                                    </div>
                           </div>
                 </div>	
         </div>
         <!--我的解答-->
         <div class="tab-pane" id="my-answer">
                         <div class="personal-right">
                           <div class="my-question">
                                    <h2 class="personal-home-title">你在以下帖子中做出了回复</h2>
                                    <div class="fav_list">
                                        <?php if(count($model->answers)==0){?>
                                        <p>您还没有解答过问题，快点去解答吧~~</p>
                                        <?php }?>
                                        
                                    <?php   foreach ($model->answers as $answer) { ?>
                                            <dl>
                                                    <!--标题-->
                                                    <dt>
                                                                 <span class="time"><?php echo CHtml::encode($answer->question->question_date); ?></span>
                                                                 <span class="title">
                                                                  <?php echo CHtml::link(CHtml::encode($answer->question->question_title),$answer->question->getQuestionUrl()); ?>
                                                                 </span>
                                                    </dt>
                                                    <!--标签-->
                                                    <dd>
                                                            <strong>标签：</strong>
                                                            <div class="post-tag">
                                                                <?php echo CHtml::link(CHtml::encode($answer->question->tag->tag_name),$answer->question->getTagUrl()); ?>
                                                            </div>     
                                                    </dd>
                                            </dl>
                                        <?php }?>
                                    </div>
                           </div>
                 </div>
         </div>
         <!--我的评论-->
         <div class="tab-pane" id="my-comment">
                         <div class="personal-right">
                           <div class="my-question">
                                    <h2 class="personal-home-title">有人在以下帖子中对你进行了评论</h2>
                                    <div class="fav_list">
                                    <?php if(count($model->comments)==0){?>
                                        <p>您还没有进行过评论，快点去评论吧~~</p>
                                        <?php }?>
                                        
                                    <?php   foreach ($model->comments as $comment) { ?>
                                            <dl>
                                                    <!--标题-->
                                                    <dt>
                                                                 <span class="time"><?php echo CHtml::encode($comment->comment_date); ?></span>
                                                                 <span class="title">
                                                                <?php echo CHtml::link(CHtml::encode($comment->comment_content),$comment->answer->question->getQuestionUrl()); ?>
                                                                 </span>
                                                    </dt>
                                                    <!--标签-->
                                                    <dd>
                                                            <strong>标签：</strong>
                                                            <a href="/questions/tagged/java" class="post-tag" title="show questions tagged 'java'" rel="tag">java</a>                                   <a href="/questions/tagged/java" class="post-tag" title="show questions tagged 'java'" rel="tag">java</a>                                   <a href="/questions/tagged/java" class="post-tag" title="show questions tagged 'java'" rel="tag">java</a>
                                                            <a href="/questions/tagged/java" class="post-tag" title="show questions tagged 'java'" rel="tag">java</a>     
                                                    </dd>
                                            </dl>
                                    <?php } ?>
                                    </div>
                           </div>
                 </div>
         </div>
         <!--留言板-->
         <div class="tab-pane" id="my-leave">
                         <div class="personal-right">
                           <div class="per_notebook">
                                    <h2 class="personal-home-title">留言板</h2>
                                    <!--留言输入框和按钮-->
                                    
                                    <?php  echo CHtml::beginForm($this->createUrl('user/addMessage', array(
                                            'id'=>$model->user_id,
                                    )), "post",array('id'=>'addMessage')) ?>   
                                        <div  name="content"  cols="" rows="" class="text_1">

                                           <?php //'t.parent_id !=:parent',array('parent'=>0)
                                               echo CHtml::textArea("add_message",".", array(
                                                   'id' => $model->user_id,
                                                   'name'=>'add_message',
                                                   'style'=>"color: #999;height:100px;width:95%;",
                                                   'onclick'=>"this.value=''",
                                                   'onkeydown'=>"this.style.color = '#000000'"
                                                   ));

                                           ?>
                                        </div>  

                                        <div class="btn_area">
                                            <button  class="btn_1" id="cont" style=""><span>留言</span></button>
                                        </div>
                                        
                                        <?php  echo CHtml::endForm(); ?> 
                             
                                    <!--已有留言-->
                                    <div class="note_list">	
                                         <?php if(count($model->messages)==0){?>
                                        <p>您还没有留言。。真是惨~~</p>
                                        <?php }?>
                                        
                                        <?php   foreach ($model->messages as $message) { ?>
                                          <dl>
                                                 <dt><a href="/yong_815"><img src="<?php  $user = User::model()->findByPk($message->leave_user_id);
                                                 echo CHtml::encode($user->user_icon); ?>" alt="yong_815"></a></dt>
                                                         <dd>
                                                                 <ul>
                                                                         <li>
                                                                             <span class="fr"><a href="javascript:void(0);" onclick="" style=""></a>　<a href="javascript:void(0);"></a></span>
                                                                             <div class="user_name">
                                                                                 <?php  $user = User::model()->findByPk($message->leave_user_id);
                                                                                 echo CHtml::link(CHtml::encode($user->user_name),$user->getUserUrl()); ?>
                                                                                 <span class="time"><?php echo CHtml::encode($message->message_date); ?></span>
                                                                             </div>
                                                                             
       
                                                                         </li>
                                                                         <li><?php echo CHtml::encode($message->message_content); ?></li>
                                                                 </ul>

                                                                 <ul class="answer" style="display:none" id="rep_81206">
                                                                         <li><textarea name="reply_content_reply" id="reply_content_reply_81206"></textarea></li>
                                                                         <li class="tr"><a href="javascript:void(0);" onclick="" class="btn_1"><span>回复</span></a>　<a href="javascript:void(0);" onclick="reply_cancel(81206);" class="cancel">取消</a></li>
                                                                 </ul>
                                                         </dd>
                                                 </dl>
                                        <?php }?>
                                   </div>
                           </div>
                 </div>
         </div>
</div>
			
			
		
			<!--我的问题-->

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