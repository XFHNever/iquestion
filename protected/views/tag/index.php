<?php
/* @var $this TagController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tags',
);
?>
<!--左半侧-->
<div class="side">
        <div class="menu">
             <!--tags-->
                   <h2 style=" padding-bottom:10px; margin-bottom:20px; font-size:16px; color:#0099CC"><p>所有标签:</p></h2>
                   
                   <div class="module" id="hoted-tags">
                    <?php foreach ($this->tags as $t) {?>
                       <div class="post-tag">
                            <?php echo CHtml::link(CHtml::encode($t->tag_name), array('selectTag', 'id'=>$t->tag_id)); ?>
                        </div>
                        <span class="item-multiplier">
                                <span class="item-multiplier-x">×</span>
                                &nbsp;
                                <span class="item-multiplier-count"><?php echo CHtml::encode($t->tag_num); ?></span>
                        </span>
                    <?php }?>
                    </div>
                    <!--tags end-->
        </div>
   </div>
   <!--右半侧-->
   <div class="personal-right">
        <div class="my-question">
            <!--question-->
          <h2 class="personal-home-title"><?php echo CHtml::encode($this->tag->tag_name); ?></h2>
         <div class="fav_list">
                 <?php   foreach ($this->questions as $question) { ?>
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
        <!--question end-->
            </div>

    </div>