<script>
window.onload = function(){
    document.getElementById("_qiandao_container").innerHTML
     ='<a href="http://www.egou.com/club/qiandao/qiandao.htm?id=1200" target="_blank"><img src="/images/qiandao.jpg"></a>';
};
</script>
<!--面包屑导航-->
<div class="jm_39"><font color="#a5acb2">所在位置：</font><font color="#4d4d4d"><a href='/'>中国加盟网首页</a> <{$nav}></font></div>
<!--<script src="http://www.google.com/adsense/search/ads.js" type="text/javascript"></script> 

<script type="text/javascript" charset="utf-8"> 
var pageOptions = { 
  'pubId': 'pub-8811694178341586',
  'query': '<{$key}>',
  'channel': '8454862934',
  'hl': 'zh-cn'
};

var adblock1 = { 
  'container': 'adcontainer1',
  'number': '4',
  'lines': '3',
  'fontFamily': 'verdana',
  'fontSizeTitle': '16px',
  'linkTarget': '_blank'
};

var adblock2 = { 
  'container': 'adcontainer2',
  'number': '5',
  'lines': '2',
  'fontFamily': 'verdana',
  'fontSizeTitle': '16px',
    'linkTarget': '_blank'
};


new google.ads.search.Ads(pageOptions, adblock1, adblock2);

</script>
-->

<!--主体-->
<div class="jm_box960" style="margin-bottom: 10px; ">
  <div class="jm_box_left">
  <div style='margin:0 auto; text-align:center;'>
<div id="adcontainer1"></div>

<div><script type="text/javascript"><!--
google_ad_client = "ca-pub-8811694178341586";
google_ad_slot = "3930721384";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>

</div>




  <div class="jm_41"><span class="jm_text_1"><{$name}></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="_qiandao_container"></span></div>
  <div class="jm_45">  
    <table width="760" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td colspan="4" bgcolor="#f5f8fa" style="border-bottom: #e6eef3 1px solid;">
	<{include file="ad_left.tpl"}>
    </td>
    </tr>
 <tr>
    <td width="460" bgcolor="#f9f9f9" class="jm_text_2" style="border-top: #c5c8d8 2px solid; border-bottom: #d6d6d6 1px solid; padding:8px 10px ">加盟店名称</td>
    <td width="105" bgcolor="#f9f9f9" class="jm_text_2" style="border-top: #c5c8d8 2px solid; border-bottom: #d6d6d6 1px solid; padding:8px 10px">单店投资</td>
    <td width="110" bgcolor="#f9f9f9" class="jm_text_2" style="border-top: #c5c8d8 2px solid; border-bottom: #d6d6d6 1px solid; padding:8px 10px">门店数量</td>
    <td width="85" bgcolor="#f9f9f9" class="jm_text_2" style="border-top: #c5c8d8 2px solid; border-bottom: #d6d6d6 1px solid; padding:8px 10px">综合指数</td>
  </tr>
  <{foreach from=$ret item=item}>
  <tr>
    <td bgcolor="#FFFFFF" style="border-bottom: #e6eef3 1px solid; padding-right:20px;"><span class="jm_text_3" style="line-height: 40px;"><a href="/project/<{$item.project_id}>.html" target='_blank'><{$item.name}></a></span> 
	    &nbsp;&nbsp;[ <span class="jm_text_4"><a href="/c<{$item.parent_id}>/"><{$item.parent_name}></a></span> &gt; <a href="/c<{$item.cat_id}>/"><span class="jm_text_4"><{$item.cat_name}></span></a> ]<br/>
      <span class="jm_text_5">品牌名称:<{$item.name}> 发源地:<{$item.original}> 成立时间:<{$item.found}> 保证金:<{$item.guarantee_fee}> 营业条件:<{$item.shop_require}> 经营产品:<{$item.product}></span></td>
    <td bgcolor="#FFFFFF" class="jm_text_6" style="border-bottom: #e6eef3 1px solid;"><{$item.invest}></td>
    <td bgcolor="#FFFFFF" class="jm_text_6" style="border-bottom: #e6eef3 1px solid;"><{$item.shops}></td>
    <td bgcolor="#FFFFFF" class="jm_text_6" style="border-bottom: #e6eef3 1px solid;">30229</td>
  </tr>
  <{/foreach}>
  <tr>
    <td colspan="4" bgcolor="#ffffff">
	<{if $pages}>
    <div class="list_page_number">
	    <{$pages}>
</div>
    <{/if}>
    </td>
  </tr>
    </table>
    <div id="adcontainer2"></div>
 </div> 

  </div>
    <{include file="sidebar_rank.tpl"}>
    <{include file="sidebar_brand.tpl"}>
    <{include file="ad_right.tpl"}>
    <{include file="sidebar_rec.tpl"}>  
  </div>
  
  <div style="clear:both"></div>
</div>

<div style='width:960px;margin:0 auto; text-align:center;margin-bottom:20px;'>

</div>




