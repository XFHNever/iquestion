<?php
/* @var $this AnswerController */
/* @var $model Answer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'answer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'answer_id'); ?>
		<?php echo $form->textField($model,'answer_id'); ?>
		<?php echo $form->error($model,'answer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_id'); ?>
		<?php echo $form->textField($model,'question_id'); ?>
		<?php echo $form->error($model,'question_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer_content'); ?>
		<?php echo $form->textField($model,'answer_content',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'answer_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer_date'); ?>
		<?php echo $form->textField($model,'answer_date'); ?>
		<?php echo $form->error($model,'answer_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vote_num'); ?>
		<?php echo $form->textField($model,'vote_num'); ?>
		<?php echo $form->error($model,'vote_num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->