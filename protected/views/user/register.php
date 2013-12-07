<div class="zu-wrap zu-main">
            <div id="content">
               <h1>欢迎加入爱问</h1>
                <div class="grid-16-8 clearfix">
                     <div class="article">
                          <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'register-form',
                                    'enableAjaxValidation'=>true,
                           )); ?>
                       
                         <div name="lzform">
                             
                                   
                                <div class="item extra-tips">
                                   <label>名&nbsp;&nbsp;号</label>
                                   <?php echo $form->textField($model,'user_name',array('size'=>50,'maxlength'=>60,'class'=>'basic-input',)); ?>
                                   <?php echo $form->error($model,'user_name'); ?>
                                        
                                </div>
                                <div class="suggestion">
                                        <span class="tips">第一印象很重要，起个响亮的名号吧</span>
                                </div>
                                <div class="item extra-tips">
                                        <label>邮&nbsp;&nbsp;箱</label>
                                        <?php echo $form->textField($model,'user_email',array('size'=>50,'maxlength'=>60,'class'=>'basic-input',)); ?>
                                        <?php echo $form->error($model,'user_email'); ?>
                                </div>
                                <div class="suggestion">
                                        <div id="email_suggestion"></div>
                                </div>
                                <div class="item extra-tips">
                                        <label>密&nbsp;&nbsp;码</label>
                                        <?php echo $form->textField($model,'user_password',array('size'=>50,'maxlength'=>60,'class'=>'basic-input',)); ?>
                                        <?php echo $form->error($model,'user_password'); ?>
                                       
                                </div>
                        


                                <div class="item-submit">
                                        <label>&nbsp;</label>
                                        <?php echo CHtml::submitButton('注册',array('class'=>'btn-submit disabled')); ?>
                                        
                                </div>
                         </div>
                        <?php $this->endWidget(); ?>
                          <div class="form-signin">
                                 <a href="<?php echo $this->createUrl('/user/login');?>" class="login-a">已有账号，我要登陆>></a>
                          </div>
                  </div>
         </div>
        </div>

</div>
