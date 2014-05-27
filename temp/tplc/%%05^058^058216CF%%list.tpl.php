<?php /* Smarty version 2.6.26, created on 2014-05-26 14:48:27
         compiled from list.tpl */ ?>
<!--面包屑导航-->
<div class="jm_39"><font color="#a5acb2">所在位置：</font><font color="#4d4d4d"><a href='/'>中国加盟网首页</a> <?php echo $this->_tpl_vars['nav']; ?>
</font></div>
<!--主体-->
<div class="jm_box960" style="margin-bottom: 10px; ">
  <div class="jm_box_left">
  <div style='margin:0 auto; text-align:center;'>
      <style type="text/css">
		.about_br_bg{width:760px;padding:0 0 3px;background:#ddd; margin:0 0 10px;}
		.about_bg{width:728px;height:auto !important;min-height:50px;height:50px;padding:0 15px;border:1px solid #ebebeb;background:#fff;}
		.about_top{height:auto !important;min-height:57px;height:57px;font-size:14px;line-height:22px;padding:10px 0 10px;}
		.about_pic{height:294px;margin:15px 0 0 ;}
		.about_pic .pic_left{width:364px;height:280px;float:left;border-right:1px dotted #c5d8e6}
		.about_pic .pic_left img{width:336px;height:280px;}
		.about_pic .pic_right{width:336px;padding:0 0 0 27px;height:280px;float:left;}
		.about_pic .pic_right img{width:336px;height:280px;}
		.about_name{height:35px;font-size:18px;font-weight:bold;line-height:35px;margin:10px 0 0;}
		.about_cs_nr{font-size:14px;width:760px; position:relative;}
		.about_cs_nr td{padding-left:15px; height:50px;}
		.about_cs_pic{ width:336px; height:280px; margin:10px auto; right:50px; overflow:hidden;}
		</style>
</div>
<?php if (! $this->_tpl_vars['forbiden_ip']): ?>
<div class="about_br_bg">
	<div class="about_bg">
        <div class="about_pic">
        	<div class="pic_left"><?php echo $this->_tpl_vars['ad0']; ?>
</div>
            <div class="pic_right"><?php echo $this->_tpl_vars['ad1']; ?>
</div>
        </div>
    </div>
</div>
<?php endif; ?>

  <div class="jm_41"><span class="jm_text_1"><?php echo $this->_tpl_vars['name']; ?>
</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="_qiandao_container"></span></div>
  <div class="jm_45">  
    <table width="760" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td colspan="4" bgcolor="#f5f8fa" style="border-bottom: #e6eef3 1px solid;">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ad_left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
    </tr>
 <tr>
    <td width="460" bgcolor="#f9f9f9" class="jm_text_2" style="border-top: #c5c8d8 2px solid; border-bottom: #d6d6d6 1px solid; padding:8px 10px ">加盟店名称</td>
    <td width="105" bgcolor="#f9f9f9" class="jm_text_2" style="border-top: #c5c8d8 2px solid; border-bottom: #d6d6d6 1px solid; padding:8px 10px">单店投资</td>
    <td width="110" bgcolor="#f9f9f9" class="jm_text_2" style="border-top: #c5c8d8 2px solid; border-bottom: #d6d6d6 1px solid; padding:8px 10px">门店数量</td>
    <td width="85" bgcolor="#f9f9f9" class="jm_text_2" style="border-top: #c5c8d8 2px solid; border-bottom: #d6d6d6 1px solid; padding:8px 10px">综合指数</td>
  </tr>
  <?php $this->assign('i', '1'); ?>
  <?php $_from = $this->_tpl_vars['ret']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
  <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
  <tr>
    <td bgcolor="#FFFFFF" style="border-bottom: #e6eef3 1px solid; padding-right:20px;"><span class="jm_text_3" style="line-height: 40px;"><a href="/project/<?php echo $this->_tpl_vars['item']['project_id']; ?>
.html" target='_blank'><?php echo $this->_tpl_vars['item']['name']; ?>
</a></span> 
	    &nbsp;&nbsp;[ <span class="jm_text_4"><a href="/c<?php echo $this->_tpl_vars['item']['parent_id']; ?>
/"><?php echo $this->_tpl_vars['item']['parent_name']; ?>
</a></span> &gt; <a href="/c<?php echo $this->_tpl_vars['item']['cat_id']; ?>
/"><span class="jm_text_4"><?php echo $this->_tpl_vars['item']['cat_name']; ?>
</span></a> ]<br/>
      <span class="jm_text_5">品牌名称:<?php echo $this->_tpl_vars['item']['name']; ?>
 发源地:<?php echo $this->_tpl_vars['item']['original']; ?>
 成立时间:<?php echo $this->_tpl_vars['item']['found']; ?>
 保证金:<?php echo $this->_tpl_vars['item']['guarantee_fee']; ?>
 营业条件:<?php echo $this->_tpl_vars['item']['shop_require']; ?>
 经营产品:<?php echo $this->_tpl_vars['item']['product']; ?>
</span></td>
    <td bgcolor="#FFFFFF" class="jm_text_6" style="border-bottom: #e6eef3 1px solid;"><?php echo $this->_tpl_vars['item']['invest']; ?>
</td>
    <td bgcolor="#FFFFFF" class="jm_text_6" style="border-bottom: #e6eef3 1px solid;"><?php echo $this->_tpl_vars['item']['shops']; ?>
</td>
    <td bgcolor="#FFFFFF" class="jm_text_6" style="border-bottom: #e6eef3 1px solid;">30229</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td colspan="4" bgcolor="#ffffff">
	<?php if ($this->_tpl_vars['pages']): ?>
    <div class="list_page_number">
	    <?php echo $this->_tpl_vars['pages']; ?>

</div>
    <?php endif; ?>
    </td>
  </tr>
    </table>
 </div> 

  </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar_rank.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar_brand.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ad_right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php if (! $this->_tpl_vars['forbiden_ip']): ?>
<div class="about_br_bg">
	<div class="about_bg">
        <div class="about_pic">
        	<div class="pic_left"><?php echo $this->_tpl_vars['ad2']; ?>
</div>
            <div class="pic_right">
            	<script type="text/javascript">
					/*336*280，创建于2014-5-17*/
					var cpro_id = "u1559295";
				</script>
				<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
			</div>
        </div>
    </div>
</div><?php endif; ?>
	
  </div>
  
  <div style="clear:both"></div>
</div>

<div style='width:960px;margin:0 auto; text-align:center;margin-bottom:20px;'>
</div>



