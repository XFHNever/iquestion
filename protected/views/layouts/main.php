<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        
         <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/signin.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/down.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.css" />
       
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jQuery.js"></script> 
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-transition.js"></script> 
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tab.js"></script> 
        <!-- dd menu -->
        <script type="text/javascript">
        <!--
        var timeout         = 500;
        var closetimer		= 0;
        var ddmenuitem      = 0;

        // open hidden layer
        function mopen(id)
        {	
                // cancel close timer
                mcancelclosetime();

                // close old layer
                if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

                // get new layer and show it
                ddmenuitem = document.getElementById(id);
                ddmenuitem.style.visibility = 'visible';

        }
        // close showed layer
        function mclose()
        {
                if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
        }

        // go close timer
        function mclosetime()
        {
                closetimer = window.setTimeout(mclose, timeout);
        }

        // cancel close timer
        function mcancelclosetime()
        {
                if(closetimer)
                {
                        window.clearTimeout(closetimer);
                        closetimer = null;
                }
        }

        // close layer when click-out
        document.onclick = mclose; 
        // -->
            
    

        
        </script> 
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="container" id="page">
         <div  role="navigation" class="header">
			   <div class="zg-wrap" id="zh-top-inner">
					<a href="/" class="zu-top-link-logo" id="zu-top-link-logo">爱问</a>
                                        <div class="zu-top-search" id="zu-top-search" role="search">
                                            <?php  echo CHtml::beginForm($this->createUrl('question/search'), "post",array('id'=>'contentsearch')) ?>   
                                            <div id="zh-top-search-form" class="zu-top-search-form form-with-magnify">

                                               <?php //'t.parent_id !=:parent',array('parent'=>0)
                                                   echo CHtml::textField("keyword","搜索问题...", array(
                                                       'name'=>'keyword',
                                                       'style'=>"color: #999;height:90%;width:95%;",
                                                       'onclick'=>"this.value=''",
                                                       'onkeydown'=>"this.style.color = '#000000'"
                                                       ));

                                               ?>
                                            </div>  

                                            <button class="zu-top-add-question" id="zu-top-add-question" onclick="">搜索答案</button>
                                            <?php  echo CHtml::endForm(); ?> 
                                           
                                             
                                        </div>  
                                        <a type="button" class="zu-top-add-question" id="zu-top-add-question" href="<?php echo $this->createUrl('question/create') ?>" style=" margin-left: 10px; margin-top: 7px; color: white; ">我要提问</a>
                                                <div id="mainmenu">
                                                        <?php $this->widget('zii.widgets.CMenu',array(
                                                                'items'=>array(
                                                                        array('label'=>'首页', 'url'=>array('/question/index')),
                                                                        array('label'=>'分类', 'url'=>array('/tag/index')),
                                                                        array('label'=>'用户', 'url'=>array('/user/index')),
                                                                        array('label'=>'精选', 'url'=>array('/question/hot')),
                                                                ),
                                                        )); ?>
                                                </div><!-- mainmenu -->
                                               
                                                <div class="top-nav-profile" >
                                                    <?php if(Yii::app()->user->isGuest) { ?>
                                                    <div style=" height: 45px; width: 60px; text-align: center;margin: 0 atuo;">
                                                    <div id="mainmenu" >
                                                        <?php $this->widget('zii.widgets.CMenu',array(
                                                                'items'=>array(
                                                                         array('label'=>'登陆', 'url'=>array('/user/login')),
                                                                ),
                                                        )); ?>
                                                    </div><!-- mainmenu -->
                                                    </div>
                                                    <?php } else { 
                                                        $user = User::model()->findByPk(Yii::app()->user->id);
                                                        ?>
                                                     <img class="avatar"  src="<?php echo Chtml::encode($user->user_icon); ?>" onclick="window.open('personalHome.html','_self')"/>
                                                     <div id="sddm">
                                                           <li>
                                                                  <a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()"><?php echo Chtml::encode($user->user_name); ?></a>
                                                                      <div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                                                                              <a href="<?php echo $this->createUrl('/user/view',array('id'=>Yii::app()->user->id));?>">个人中心</a>
                                                                              <a href="<?php echo $this->createUrl('/user/view',array('id'=>Yii::app()->user->id));?>">修改资料</a>
                                                                              <a href="<?php echo $this->createUrl('/user/logout');?>" >退出</a>
                                                                      </div>
                                                          </li>
                                                      </div>
                                                    <?php } ?> 
						   
							
					</div>
			   </div>
		  </div>
    <!--主题-->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
        
          <div class="zg-wrap zu-main" role="main">
	        <div class="zu-main-content">
                        <?php echo $content; ?>
                </div>
          </div>
	

	<div class="clear"></div>

	<div id="footer">
            
		Copyright &copy; <?php echo date('Y'); ?> by Never.<br/>
		All Rights Reserved.<br/>
		Powered By WQW.<br/>
	</div><!-- footer -->
       
</div><!-- page -->

</body>
</html>

<script>

</script>