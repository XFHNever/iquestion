<?php
/* @var $this TagController */
/* @var $data Tag */
?>

<div class="view">
    <div class="post-tag">
        <?php echo CHtml::link(CHtml::encode($data->tag_name), array('selectTag', 'id'=>$data->tag_id)); ?>
    </div>
    <span class="item-multiplier">
            <span class="item-multiplier-x">×</span>
            &nbsp;
            <span class="item-multiplier-count"><?php echo CHtml::encode($data->tag_num); ?></span>
    </span>
    
	


</div>