<?php
/* @var $this AnswerController */
/* @var $data Answer */
?>

<div class="view">

         <div class=" bd answer-first answer-fold">
            <div class="line"">
                    <!--回复的人和时间-->
                    <div class="line info f-aid">
                                <span class="grid-r pos-time"> 
                                        <ins class="accuse-area" alog-alias="qb-accuse-link" style="display: none; "></ins>
                                        2012-06-20 23:34
                                </span>
                            <a class="user-info" href="/">谢福恒</a>

                        </div>
                        <!--回复的正文-->
                        <div class="line content">
                            <!--回复正文-->
                            <pre accuse="aContent" style="margin-top:10px;" class="answer-text mb-10">因为蚊子的体形很独特，雨滴之所以没有砸死蚊子，很大程度上是因为雨滴变形绕过了体积非常迷你的蚊子。
                                </pre>
                                <!--评论和点赞等-->
                                <div class="grid-r f-aid ">
                                    <!--评论-->
                                     <span alog-action="qb-comment-btn" class="comment f-blue" id="comment-1072832204">评论</span>
                                             <span class="f-pipe">|</span>
                                             <!--赞-->
                                     <a stats="NF_24031577829_701_276185229" href="/" class="ilike_icon" onclick="/">赞</a>
                                </div>
                        </div>

                </div>

      </div>
	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->answer_id), array('view', 'id'=>$data->answer_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::encode($data->question_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_content')); ?>:</b>
	<?php echo CHtml::encode($data->answer_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_date')); ?>:</b>
	<?php echo CHtml::encode($data->answer_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vote_num')); ?>:</b>
	<?php echo CHtml::encode($data->vote_num); ?>
	<br />


</div>