<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'question_id'); ?>
		<?php echo $form->textField($model,'question_id'); ?>
		<?php echo $form->error($model,'question_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag_id'); ?>
		<?php echo $form->textField($model,'tag_id'); ?>
		<?php echo $form->error($model,'tag_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_title'); ?>
		<?php echo $form->textField($model,'question_title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'question_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_content'); ?>
		<?php echo $form->textField($model,'question_content',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'question_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_date'); ?>
		<?php echo $form->textField($model,'question_date'); ?>
		<?php echo $form->error($model,'question_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'view_num'); ?>
		<?php echo $form->textField($model,'view_num'); ?>
		<?php echo $form->error($model,'view_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'award_point'); ?>
		<?php echo $form->textField($model,'award_point'); ?>
		<?php echo $form->error($model,'award_point'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->