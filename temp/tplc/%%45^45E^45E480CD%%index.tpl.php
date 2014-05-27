<?php /* Smarty version 2.6.26, created on 2014-05-27 22:06:04
         compiled from index.tpl */ ?>
<?php if ($this->_tpl_vars['notice_1'] != ""): ?>
<div style="z-index:99999;top:30%;position:fixed;left:0;right:0;_left:24%;_right:0;_position:absolute;_bottom:0;_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)));
	margin-left:auto;
	margin-right:auto;">
	<div id="notice" class="jmw_layer">
	<div class="layer_close"><a href="javascript:close();"></a></div>
    <div class="jmw_layer_name">签到须知</div>
    <div class="jmw_layer_nr">
    <p><span class="number">1</span> 必须严格按照以下流程,才能找到签到按钮.</p>
    <p class="liucheng"><span class="padding_left28">首页</span>项目列表页<span class="padding_left45">项目详情页</span>签到</p>
    <p><span class="number">2</span> <?php echo $this->_tpl_vars['notice_1']; ?>
</p>
	<?php if ($this->_tpl_vars['notice_2'] != ""): ?>
    <p class="margin_top15"><span class="number">3</span> <?php echo $this->_tpl_vars['notice_2']; ?>
<br /><?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;感谢大家支持！</p>
    </div>
    <div class="layer_yes"><a href="javascript:close();">我知道了</a></div>
</div>
</div>
<script language="javascript">
function close(){
	$("#notice").hide();
}
</script>
<?php endif; ?>
<!--  分类  -->
<!-- 广告位：首页第一屏通栏-->
<?php if (! $this->_tpl_vars['forbiden_ip']): ?>
<div style="margin-left: auto;margin-right: auto;width:950px;"><script type="text/javascript">
/*960*90，创建于2014-5-15*/
var cpro_id = "u1556393";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div><?php endif; ?>
<p>&nbsp</p>
<div class="jmw_nav_bg">
	<ul><?php $_from = $this->_tpl_vars['cats_gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
			<li class="bg_color<?php echo $this->_tpl_vars['count']%2; ?>
">
				<div class="nav_info">
					<div class="li_icon<?php echo $this->_tpl_vars['count']; ?>
"></div>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sub_cat_item.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
			</li><?php endforeach; endif; unset($_from); ?></ul>
</div>
<?php if (! $this->_tpl_vars['forbiden_ip']): ?>
<div style="margin-left: auto;margin-right: auto;width:950px;"><p>&nbsp</p>
	<script type="text/javascript">/*960*90，创建于2014-5-17*/
	var cpro_id = "u1559303";</script>
	<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</div><?php endif; ?>