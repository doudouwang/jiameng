<div class="jm_box100%" style="background: #e5edfd;">
  <div class="jm_1" style="height:80px">
    <div class="jm_logo"><a href="/"><img src="<{$img_domain}>/images/jm_1.png" width="254" height="32" /></a></div>
  </div>
</div>
<div class="jm_box100%" style="background: #e5edfd; background: url( <{$img_domain}>/images/jm_4.png); margin-bottom: 10px; ">
  <div class="jm_1" style="height:37px">
    <div id="jm_2">
      <ul>
        <li><a <{if $topnav!='list'}>id="current"<{/if}> href="/">主页</a></li>
      </ul>
    </div>
    <div id="jm_2">
      <ul>
        <li><a <{if $topnav=='list'}>id="current"<{/if}>href="/all/">找项目</a></li>
      </ul>
    </div>
    <div class="jm_3"><img src="<{$img_domain}>/images/jm_26.png" width="17" height="11" style="margin-bottom: -1px;"/> 
	    <{foreach from=$top_cats item=item name="top_nav_cats"}>
		    <a href="/c<{$item.cat_id}>/"><{$item.name}></a> 
		    <{if !$smarty.foreach.top_nav_cats.last}> - <{/if}> 
	    <{/foreach}>		 
    </div>
  </div>
  <div class="jm_1" style="height:53px">
    <form id="search_form" action="/search.php" method="GET">
    <table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="140" height="53"><select name="top_cat_id" id="top_cat_id" style="width: 130px;">
          <option value=0>创业加盟行业</option>
	  <{html_options options=$top_cats_options selected=$top_cats_selected}>
        </select></td>
        <td width="140">
		<select name="sub_cat_id" id="sub_cat_id" style="width: 130px;" id="sub_cats">
			<option value=0>行业子分类</option>
		</select>
	</td>
        
        <td width="320"><input class="jm_4" name="keyword" onfocus="this.className='jm_4_1'" onblur="this.className='jm_4'" 
			       style="width: 300px;" size="35" /></td>
        <td width="220"><a href="/search.php" class="search_btn"><img src="<{$img_domain}>/images/jm_5.png" width="67" height="21" /></a></td>
      </tr>
    </table>
    </form>
  </div>
</div>

<script type="text/javascript">
	$(function(){
		$("#top_cat_id").bind('change', function(){
			var v = $(this).val();
			changeSubCat(v);
		});
		$('.search_btn').click(function(){
			$("#search_form").submit();
			return false;
		});
		function changeSubCat(tid){
			if(tid==0){
				$('#sub_cat_id').html("<option value=0>行业子分类</option>");
				return;
			}
			url = "/ajax.php?mod=subcategories&id=" + tid;
			$.ajax({
				url : url,
				type : "GET",
				success : function(data){
					var html = "<option value=0>行业子分类</option>";
					var data = $.parseJSON(data);
					for(i=0; i< data.length; i++){
						html += "<option value='"+data[i].cat_id+"'>"+data[i].name+"</option>";	
					}
					$('#sub_cat_id').html(html);
				}
			});
		}
		$("#top_cat_id").trigger('change');
	});
</script>