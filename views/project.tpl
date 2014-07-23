<!--面包屑导航-->
<div class="jm_39" style="border-bottom: #cecece 1px solid; ">
	<font color="#a5acb2">所在位置：</font>
	<a href="/">中国加盟网首页</a> <{$nav}>
</div>
<!--主体-->
<div class="jm_42"><span class="jm_text_1"><{$info.name}></span></div>
<div class="jm_box960" style="margin-bottom: 10px; ">
  <div class="jm_box_left">
    <div style="margin-bottom: 10px; ">
      <style type="text/css">
		.about_br_bg{width:760px;padding:0 0 3px;background:#ddd; margin:0 0 10px;}
		.about_bg{width:728px;height:auto !important;min-height:50px;height:50px;padding:0 15px;border:1px solid #ebebeb;background:#fff;}
		.about_top{height:auto !important;min-height:57px;height:57px;font-size:14px;line-height:22px;padding:10px 0 10px;}
		.about_pic{height:324px;margin:10px 0;}
		.about_pic .pic_left{width:364px;height:322px;float:left;border-right:1px dotted #c5d8e6}
		.about_pic .pic_left img{width:336px;height:280px;}
		.about_pic .pic_right{width:336px;padding:0 0 0 27px;height:322px;float:left;}
		.about_pic .pic_right img{width:336px;height:280px;}
		.about_name{height:35px;font-size:18px;font-weight:bold;line-height:35px;margin:10px 0 0;}
		.about_nameone{height:20px;font-size:12px;line-height:20px; color:#666; margin:5px 0 0;}
		.about_nameone a{ color:#666}
		.about_cs_nr{font-size:14px;width:760px; }
		.about_cs_nr td{padding-left:15px; height:50px;}
		.about_cs_pic{ width:336px; height:320px; margin:0 auto; overflow:hidden;}
		.about_cs_qd{ width:75px; height:20px; margin:10px auto 10px;}
		.about_pic .pic_left .about_cs_qd img,.about_pic .pic_right .about_cs_qd img{width:75px; height:20px;}
	</style>
<div class="about_br_bg">
	<div class="about_bg">
    	<div class="about_top"><{$info.company}>基本投资<{$info.invest}>成立时间<{$info.found}>注册资本<{$info.register_capital}>门店总数<{$info.shops}>经营模式<{$info.mode}> ; <{$info.group}>;公司地址<{$info.address}></div>
    </div>
 </div>
 
<div class="about_br_bg">
	<div class="about_bg">
		<div class="about_nameone" >赞助商广告</div>
        <div class="about_pic">
        	<div class="pic_left"><{if !$forbiden_ip}><{$ad0}><{/if}><{if $qdindex==0}><{include file="qiandao.tpl"}><{/if}></div>
            <div class="pic_right"><{if !$forbiden_ip}><{$ad1}><{/if}><{if $qdindex==1}><{include file="qiandao.tpl"}><{/if}></div>
        </div>
    </div>
</div>

<div class="about_name"><{$info.name}>参数</div>
<div class="about_cs_nr">
<table width="760" border="0" cellspacing="1" cellpadding="0" bgcolor="#ebebeb">
  <tr>
    <td bgcolor="#fafafa" width="137">品牌名称(中文)：</td>
    <td bgcolor="#ffffff" width="216"><{$info.name}></td>
    <td bgcolor="#fafafa" width="210">品牌发源地： </td>
    <td bgcolor="#ffffff" width="140"><{$info.original}></td>
  </tr>
  <tr>
    <td bgcolor="#fafafa">品牌名称(英文)：</td>
    <td bgcolor="#ffffff"><{$info.english_name}></td>
    <td bgcolor="#fafafa">品牌创立时间： </td>
    <td bgcolor="#ffffff"><{$info.found}></td>
  </tr>
  <tr>
    <td bgcolor="#fafafa">商务备案： </td>
    <td bgcolor="#ffffff">-</td>
    <td bgcolor="#fafafa">门店总数： </td>
    <td bgcolor="#ffffff"><{$info.shops}></td>
  </tr>
  <tr>
    <td bgcolor="#fafafa">直营店总数：</td>
    <td bgcolor="#ffffff"><{$info.direct_shop_num}></td>
    <td bgcolor="#fafafa">加盟/代理总店数：</td>
    <td bgcolor="#ffffff"><{$info.agent_shop_num}></td>
  </tr>
  <tr>
    <td bgcolor="#fafafa">区域授权： </td>
    <td bgcolor="#ffffff"><{$info.name}> </td>
    <td bgcolor="#fafafa">直营店成立时间：</td>
    <td bgcolor="#ffffff"><{$info.direct_shop_found}></td>
  </tr>
  <tr>
    <td bgcolor="#fafafa">商务备案： </td>
    <td bgcolor="#ffffff">-</td>
    <td colspan="2" rowspan="6" width="350" bgcolor="#ffffff" style="padding:0 0 0 1px;">
    <div class="about_cs_pic"><{if !$forbiden_ip}><{$ad2}><{/if}><{if $qdindex==2}><{include file="qiandao.tpl"}><{/if}></div>
    <{$onload}>
    </td>
    </tr>
  <tr>
    <td bgcolor="#fafafa">加盟区域： </td>
    <td bgcolor="#ffffff">-</td>
    </tr>
  <tr>
    <td bgcolor="#fafafa">经营产品： </td>
    <td bgcolor="#ffffff"><{$info.product}></td>
    </tr>
  <tr>
    <td bgcolor="#fafafa">经营模式： </td>
    <td bgcolor="#ffffff" >-</td>
    </tr>
  <tr>
    <td bgcolor="#fafafa">发展模式： </td>
    <td bgcolor="#ffffff"><{$info.mode}></td>
    </tr>
  <tr>
    <td bgcolor="#fafafa">适合投资人群： </td>
    <td bgcolor="#ffffff"><{$info.group}></td>
    </tr>
</table>

</div>
    </div>
    <{include file="ad_left.tpl"}>
    <div class="jm_56" style="margin-bottom: 10px; ">
      <div class="jm_56">
        <div class="jm_57"><{$info.name}>加盟条件</div>
        <div class="jm_58"></div>
        <div class="jm_59"></div>
      </div>
      <div class="jm_60">
        <div class="jm_62">
          <table width="728" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="180" bgcolor="#f8f8f8">品牌名称(中文)：</td>
              <td width="180" class="jm_text_6"><{$info.name}></td>
              <td width="180" bgcolor="#f8f8f8">品牌发源地：</td>
              <td width="180" class="jm_text_6"><{$info.original}></td>
            </tr>
            <tr>
              <td bgcolor="#f8f8f8">品牌名称(英文)：</td>
              <td class="jm_text_6"><{$info.english_name}></td>
              <td bgcolor="#f8f8f8">品牌创立时间：</td>
              <td class="jm_text_6"><{$info.found}></td>
            </tr>
            <tr>
              <td bgcolor="#f8f8f8">商务备案：</td>
              <td class="jm_text_6">-</td>
              <td bgcolor="#f8f8f8">门店总数：</td>
              <td class="jm_text_6"><{$info.shops}></td>
            </tr>
            <tr>
              <td bgcolor="#f8f8f8">直营店总数：</td>
              <td class="jm_text_6"><{$info.direct_shop_num}></td>
              <td bgcolor="#f8f8f8">加盟/代理总店数：</td>
              <td class="jm_text_6"><{$info.agent_shop_num}></td>
            </tr>
            <tr>
              <td bgcolor="#f8f8f8">区域授权：</td>
              <td class="jm_text_6">-</td>
              <td bgcolor="#f8f8f8">直营店成立时间：</td>
              <td><span class="jm_text_6"><{$info.direct_shop_found}></span></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <{include file="ad_left.tpl"}>
    <div class="jm_56" style="margin-bottom: 10px; ">
      <div class="jm_56">
        <div class="jm_57"><{$info.name}>简介</div>
        <div class="jm_58"></div>
        <div class="jm_59"></div>
      </div>
      <div class="jm_60">
        <div class="jm_63">
          	<{$info.description}>
        </div>
      </div>
    </div>
  </div>
  <div class="jm_box_right">
    <div class="jm_69" style="margin-bottom: 10px; ">
      <div class="jm_68">
        <table width="170" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" style="border-bottom: #d6d6d6 1px dashed;" valign="top"><div class="jm_70"><img src="/images/logo/<{$info.logo}>" width="113" height="87" /></div></td>
          </tr>
          <tr>
            <td width="30" align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_30.png" width="14" height="14" /></td>
            <td width="140" style="border-bottom: #d6d6d6 1px dashed;">品牌名称：<span class="jm_text_7"><{$info.name}></span></td>
          </tr>
          <tr>
            <td align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_31.png" width="14" height="14" /></td>
            <td style="border-bottom: #d6d6d6 1px dashed;">企业类型：<span class="jm_text_7">民营</span></td>
          </tr>
          <tr>
            <td align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_32.png" width="14" height="14" /></td>
            <td style="border-bottom: #d6d6d6 1px dashed;">会员注册：<span class="jm_text_7"><{$info.create_time}></span></td>
          </tr>
          <tr>
            <td align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_41.png" width="14" height="14" /></td>
            <td style="border-bottom: #d6d6d6 1px dashed;">资料更新：<span class="jm_text_7"><{$info.modify_time}></span></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="jm_66" style="margin-bottom: 10px; ">
      <div class="jm_67"><{$info.name}>访问信息</div>
      <div class="jm_68">
        <table width="170" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30" align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_30.png" width="14" height="14" /></td>
            <td width="140" style="border-bottom: #d6d6d6 1px dashed;">本月访问：<span class="jm_text_7">4563</span></td>
          </tr>
          <tr>
            <td align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_31.png" width="14" height="14" /></td>
            <td style="border-bottom: #d6d6d6 1px dashed;">总访问：<span class="jm_text_7">4563</span></td>
          </tr>
          <tr>
            <td align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_32.png" width="14" height="14" /></td>
            <td style="border-bottom: #d6d6d6 1px dashed;">本月排名：<span class="jm_text_7">4563</span></td>
          </tr>
          <tr>
            <td align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_41.png" width="14" height="14" /></td>
            <td style="border-bottom: #d6d6d6 1px dashed;">上榜时间：<span class="jm_text_7">4563天</span></td>
          </tr>
          <tr>
            <td align="center" style="border-bottom: #d6d6d6 1px dashed;" ><img src="<{$img_domain}>/images/jm_41.png" width="14" height="14" /></td>
            <td style="border-bottom: #d6d6d6 1px dashed;">综合指数：<span class="jm_text_7">4563</span></td>
          </tr>
        </table>
      </div>
    </div>
    <{include file="sidebar_portal.tpl"}>
    <{include file="sidebar_rank.tpl"}>
    <{include file="sidebar_brand.tpl"}>
    <{include file="ad_right.tpl"}> 
  </div>
  <div style="clear:both"></div>
</div>
<script type="text/javascript">
	var show = false;
	var showTimerId = setTimeout($('#qdcode').show(),5000);
	window.onload=function(){
		clearTimeout(showTimerId);
		if(!show){
			$('#qdcode').show();
		}
	};
	$("#qd").toggle(function(){
		$("#captcha").animate({left:75},300);
		$("#code").animate({left:175},400);
		$("#submit").animate({left:225},500);
	},function(){
		$("#captcha").animate({left:0},500);
		$("#code").animate({left:0},400);
		$("#submit").animate({left:0},300);
	});
	$("#captcha").click(function(){
		$("#captcha").find("img").attr("src","/captcha.php");
	});
	$("#code").find("input").keydown(function(e){
		if(e.keyCode==13){
			$("#submit").find("input").click();
		}
	});  
	$("#submit").find("input").click(function(){
		var params = {};
		params.code = $("#code").find("input").val();
		$.ajax({
			url : "/captcha_check.php",
			dataType : "json",
			timeout : 1000,
			data:params,
			success : function(result) {
				if(result.r=="error"){
					$("#captcha").click();
					console.log(result.c);
					console.log(result.cc);
				}else{
					window.location = result.r;
				}
			},
			error : function(xhr, ts, et) {
				xhr = null;
			}
		});
	});
</script>