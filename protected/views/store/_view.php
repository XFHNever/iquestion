<?php
/* @var $this StoreController */
/* @var $data Store */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('store_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->store_id), array('view', 'id'=>$data->store_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::encode($data->question_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('store_date')); ?>:</b>
	<?php echo CHtml::encode($data->store_date); ?>
	<br />


</div>