<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
	'Questions',
);
?>

<div class="zu-main-content">
            <div class="zu-main-content-inner">
                       <div id="zu-welcome-once" class="zu-welcome-once zg-big-gray zg-clear" style="display:none;">
                              <a href="javascript:;" data-tip="s$b$不再提示" class="x-m"></a>
                              <h2>欢迎来到FindBugs！</h2>
                              <p class="first-line">Find bugs，Find fun；Love code，Love life！</p>
                      </div>

                      <div class="zg-section" id="zh-home-list-title">
                              <i class="zg-icon zg-icon-feedlist"></i>
                              最新问题 <input type="hidden" id="is-topstory">
                    </div>   
                    <div id="questions">
                        <?php $this->widget('zii.widgets.CListView', array(
                           'dataProvider'=>$dataProvider,
                           'itemView'=>'_view',
                       )); ?>   
                    </div>

            </div>
</div>


