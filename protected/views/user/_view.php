<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">
       <div class="user-info  user-hover">
            <div class="user-gravatar48">
                    <a href="personalHome.html"><div class=""><img src="https://www.gravatar.com/avatar/dab08478b226280d4a30894c9a7ed719?s=48&amp;d=identicon&amp;r=PG" alt="" width="48" height="48"></div></a>
            </div>
            <div class="user-details">
                    <?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
                    <span class="user-location"><?php $data->user_point ?></span><br>
                    <span class="reputation-score" title="reputation this month: 9261
total reputation: 78952" dir="ltr"><?php $data->user_point ?></span>
            </div>
            <div class="user-tags">
                    <a href="questions/tagged/regex">regex</a>, <a href="questions/tagged/.htaccess">.htaccess</a>, <a href="questions/tagged/java">java</a>
            </div>
       </div>
    
    
    
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_password')); ?>:</b>
	<?php echo CHtml::encode($data->user_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_point')); ?>:</b>
	<?php echo CHtml::encode($data->user_point); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_email')); ?>:</b>
	<?php echo CHtml::encode($data->user_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_icon')); ?>:</b>
	<?php echo CHtml::encode($data->user_icon); ?>
	<br />


</div>