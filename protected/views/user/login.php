<?php
$this->breadcrumbs=array(
	'登录',
);
?>


<?php 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
    <div class="form-signin" style="width: 200px;">
    <h2 class="form-signin-heading">Please sign in</h2>
    <div class="form-control">
        <?php echo $form->textField($model,'username',array('placeholder'=>'username','value'=>'','style'=>'width:100%;height:25px;')); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>
    <div class="form-control">
        <?php echo $form->passwordField($model,'password',array('placeholder'=>'password','value'=>'','style'=>'width:100%;height:25px;')); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>
    
    <label class="checkbox">
        <?php echo $form->checkBox($model,'rememberMe',array()); ?><span>Remember me</span>
    </label>
    
    <div class="buttons" style="text-align: center;margin: 0 auto;height:50px;">
        <?php echo CHtml::submitButton('Login',array('style'=>'color:white;text-align: center;background: #428BCA;width:100%; height;100%;')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
<div class="form-signin">
    <a href="<?php echo $this->createUrl('/user/register');?>" class="login-a">还没有账号，我要注册>></a>
 </div>
