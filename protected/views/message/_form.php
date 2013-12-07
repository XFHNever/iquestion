<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'message_id'); ?>
		<?php echo $form->textField($model,'message_id'); ?>
		<?php echo $form->error($model,'message_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'leave_user_id'); ?>
		<?php echo $form->textField($model,'leave_user_id'); ?>
		<?php echo $form->error($model,'leave_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message_content'); ?>
		<?php echo $form->textField($model,'message_content',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'message_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message_date'); ?>
		<?php echo $form->textField($model,'message_date'); ?>
		<?php echo $form->error($model,'message_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->