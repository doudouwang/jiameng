<{if $notice_1!=""}>
<div style="z-index:99999;top:30%;position:fixed;left:0;right:0;_left:24%;_right:0;_position:absolute;_bottom:0;_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)));
	margin-left:auto;
	margin-right:auto;">
	<div id="notice" class="jmw_layer">
	<div class="layer_close"><a href="javascript:close();"></a></div>
    <div class="jmw_layer_name">签到须知</div>
    <div class="jmw_layer_nr">
    <p><span class="number">1</span> 必须严格按照以下流程,才能找到签到按钮.</p>
    <p class="liucheng"><span class="padding_left28">首页</span>项目列表页<span class="padding_left45">项目详情页</span>签到</p>
    <p><span class="number">2</span> <{$notice_1}></p>
	<{if $notice_2!=""}>
    <p class="margin_top15"><span class="number">3</span> <{$notice_2}><br /><{/if}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;感谢大家支持！</p>
    </div>
    <div class="layer_yes"><a href="javascript:close();">我知道了</a></div>
</div>
</div>
<script language="javascript">
function close(){
	$("#notice").hide();
}
</script>
<{/if}>
<!--  分类  -->
<!-- 广告位：首页第一屏通栏-->
<{if !$forbiden_ip}>
<div style="margin-left: auto;margin-right: auto;width:950px;"><script type="text/javascript">
/*960*90，创建于2014-5-15*/
var cpro_id = "u1556393";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div><{/if}>
<p>&nbsp</p>
<div class="jmw_nav_bg">
	<ul><{foreach from=$cats_gallery item=item key=key}>
		<{assign var=count value=$count+1}>
			<li class="bg_color<{$count%2}>">
				<div class="nav_info">
					<div class="li_icon<{$count}>"></div>
					<{include file="sub_cat_item.tpl"}>
				</div>
			</li><{/foreach}></ul>
</div>
<{if !$forbiden_ip}>
<div style="margin-left: auto;margin-right: auto;width:950px;"><p>&nbsp</p>
	<script type="text/javascript">/*960*90，创建于2014-5-17*/
	var cpro_id = "u1559303";</script>
	<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</div><{/if}>
