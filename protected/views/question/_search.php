<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'question_id'); ?>
		<?php echo $form->textField($model,'question_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tag_id'); ?>
		<?php echo $form->textField($model,'tag_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_title'); ?>
		<?php echo $form->textField($model,'question_title',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_content'); ?>
		<?php echo $form->textField($model,'question_content',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_date'); ?>
		<?php echo $form->textField($model,'question_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'view_num'); ?>
		<?php echo $form->textField($model,'view_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'award_point'); ?>
		<?php echo $form->textField($model,'award_point'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->