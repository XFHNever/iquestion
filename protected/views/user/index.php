<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
$col=0;
$this->breadcrumbs=array(
	'Users',
);
?>
	       <div id="mainbar-full">
                    <div class="subheader">
                           <h1 id="h-users">Users</h1>
                    </div>
                    <!--介绍和搜索框-->
                    <div class="page-description">
                            <p>
                                    注册本技术交流网站的用户按照积分进行排序。
                            </p>
                            <?php  echo CHtml::beginForm($this->createUrl('search'), "post",array('id'=>'contentsearch')) ?> 
                            <table  style="margin-top:10px; width: 37%;">
                                    <tbody><tr>
                                            <td>搜索指定用户:</td>
                                            <td style="padding-left:5px">
                                                 <?php
                                                   echo CHtml::textField("keyword","搜索用户...", array(
                                                       'name'=>'keyword',
                                                       'style'=>"color: #999;height:90%;width:95%;",
                                                       'onclick'=>"this.value=''",
                                                       'onkeydown'=>"this.style.color = '#000000'"
                                                       ));

                                               ?>
                                            </td>   
                                            <td style="padding-left:10px">
                                                <button type="submit" class="btn btn-xs btn-info" onclick="">搜索</button>
                                            </td>         
                                    </tr>
                            </tbody></table>
                            <?php  echo CHtml::endForm(); ?> 
                    </div> 
                    <!--具体内容-->
		    <div id="users-list">
                        
                        <table id="users-browser" class="hot_weekly">
                                              
					      <tbody>
                                                 
                                                  <tr>
                                                        <?php foreach ($users as $user) {       
                                                         ?>
                                                           <?php  ?>
							       <td class="tag-cell">
                                                                    <div class="user-info  user-hover">
                                                                        <div class="user-gravatar48">
                                                                            
                                                                                <a href=""><div class=""><img src="<?php echo CHtml::encode($user->user_icon); ?>" alt="" width="48" height="48"></div></a>
                                                                                
                                                                           
                                                                                
                                                                        </div>
                                                                        <div class="user-details">
                                                                                <?php echo CHtml::link(CHtml::encode($user->user_name), $user->getUserUrl()); ?>
                                                                                <br>
                                                                                <span class="reputation-score" title="reputation score" dir="ltr"><?php echo CHtml::encode($user->user_point); ?></span>
                                                                        </div>
                                                                        <div class="user-tags">
                                                                                <a href="questions/tagged/regex">regex</a>, <a href="questions/tagged/.htaccess">.htaccess</a>, <a href="questions/tagged/java">java</a>
                                                                        </div>
                                                                    </div>
							       </td>
                                                        <?php } ?>
                                                       </tr>
                                                       
                                              </tbody>
                          </table> 
                        <!--结果为空的时候给出提醒-->
                        <?php if(count($users)==0){ ?>
                        <p>No result return</p>
                        <?php } ?>
                         <?php    
    
                                $this->widget('CLinkPager',array(    
                                    'header'=>'',    
                                    'firstPageLabel' => '首页',    
                                    'lastPageLabel' => '末页',    
                                    'prevPageLabel' => '上一页',    
                                    'nextPageLabel' => '下一页',    
                                    'pages' => $pages,    
                                    'maxButtonCount'=>13    
                                    )    
                                );    
                        ?>    
             
                    </div>
                    
            </div>
