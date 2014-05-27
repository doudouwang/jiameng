<style type='text/css'>
.picture_icon{width:80px;height:80px;border:5px solid #edefed;cursor:pointer;margin-right:10px;}
#picture_container {padding-bottom:10px;}
.lock{color:#888;background:transparent url(imgs/lock.png) no-repeat center;}
.unlock_btn{cursor:pointer;margin-left:10px;}
.maximize_btn{cursor:pointer;margin-left:5px;}
.maximize{position:absolute;left:10px;top:20px;
	 width:97%;height:92%;border:5px solid #000;
	 filter:alpha(opacity=92);       /* IE */
	-moz-opacity:0.92;              /* Moz + FF */
	opacity: 0.92; 
	 background:#000;color:#00CD00;
	 padding:5px;}
</style>
<div class="list">
	<form action='?m=component.save' method='post'>
	<p>
	<input type="radio" name="type" class='component_type' value="link" id="" />链接 
	</p>

	<p>
	ID（唯一）：<input type="text" name="token" id="" />
	描述：<input type="text" name="desc" id="" />
	</p>

	<div id="component_link" class='component_view'>
		<p>
		链接（链接间使用 "---" 分隔，单条格式：<br/>
		<span style='background:#fffff3;display:block;width:350px;padding:5px 10px;margin:3px 0;'>
		url:=http://www.baidu.com<br/>text:=baidu<br/>title:=百度<br/>custom:=hello
		</span>
		</p>
		<textarea name="param[links]" style='font-size:12px;' id="" cols="80" rows="15" class='source_textarea'></textarea>
		<img src='imgs/maximize.gif' title='放大' alt='放大' class='maximize_btn'/>
		<br/>
		<p>
		Smarty 模板：<br/>
		</p>
		<p>
		<textarea name="param[tpl]" id="" cols="80" rows="10" class='source_textarea important'></textarea>
		</p>
		<br/>
	<h5>上传图片</h5>
	<div class="add_picture">
		<input type="file" name="file" /><br/>
		<span class="status">&nbsp;</span>
		<br/>
	</div>
	<div id="picture_container">
	</div>
	</div>

	<div id="component_text" class='component_view'>
		<textarea name="param[text]" cols="80" rows="20" class='source_textarea' id="content"></textarea>
		<script type="text/javascript">
		$('#content').xheditor({tools:'Cut,Copy,Paste,Pastetext,|,Bold,Italic,Underline,Strikethrough,FontColor,BackColor,|,Align,List,Outdent,Indent,Link,Unlink,Table,Img,|,Source,Fullscreen',html5Upload:false,upImgUrl:'/manager/upload'});
		</script>	
	</div>

	<div id="component_img" class='component_view'>
	</div>

	

	<input type="hidden" name="cid" />
	<input type="submit" value="保存" />
	</form>
</div>

<script type="text/javascript">
	<{if $com_data}>
	var com_data = <{$com_data}>;
	<{/if}>

	$('.component_type').click(function(){
		switchComponentView();
	});

	$('#picture_container').click(function(e){
		var t = e.target;
		if($(t).is('.picture_icon')){
			var url = $(t).attr('src');
			alert(url);
			$.copy(url);
		}
	});

	function switchComponentView(){
		var v;
		$('.component_type').each(function(){
			if($(this).is(':checked')){
				v = $(this).val();
			}
		});
		$(".component_view").hide();
		$(".component_view *").attr('disabled', true);
		$("#component_"+v).show();
		$("#component_"+v+" *").attr('disabled', false);
	}

	function initUploader(){
		$('.add_picture input:file').each(function() {
			$(this).change(function(){
				$(this).upload('?m=upload', function(res){
					try{
						var data = $.parseJSON(res);
						if(typeof (data.error) != 'undefined'){
							alert(data.error);
							return;
						}
						insertPicture(data.url);
					}catch(e){}
				});
			});
		});
	}

	function insertPicture(url){
		$("#picture_container").append($('<img>').attr('src', url).attr({width: 80, height:80}).attr('title', "插入" + url).addClass('picture_icon'));
	}

	function initSwitcher(){
		if(typeof(com_data) != 'undefined'){//修改
			var type = com_data.info.type;
			$('.component_type[value='+type+']').attr('checked', true);
			for(i in com_data.param){
				$("#component_"+type+" *[name='param["+i+"]']").val(com_data.param[i]);
			}
			for(i in com_data.info){
				if (i == 'type') continue;
				$("input[name='"+i+"'], textarea[name='"+i+"']").val(com_data.info[i]);
			}
			if(typeof(com_data.error) != 'undefined'){
				alert(com_data.error);
			}

			$('.important').trigger('lock');
		}
		if($('.component_type:checked').size() == 0){
			$('.component_type:nth-child(1)').attr('checked', true);
		}
		switchComponentView();
	}

	$('.important').bind('lock',function(){
		$(this).addClass('lock').attr('readonly', true);
		$(this).after("<img src='imgs/lock_s.png' title='解锁' alt='解锁' class='unlock_btn'/>");
	});

	$('.component_view').click(function(e){
		var $t = $(e.target);
		if($t.is('.unlock_btn')){
			$t.siblings('.important').trigger('unlock');
			return false;
		}else if($t.is('.maximize_btn')){
			var $e = $t.siblings('.source_textarea');
			var $pos = $e.position();	
			$e.addClass('maximize');
			$e.focus();
		}
	});

	$('.source_textarea').keydown(function(e){
		if((e.which == 27 || (e.which == 13 && e.ctrlKey)) 
			&& $(this).is('.maximize')
		  ){ //按下 ESC 或 Ctrl + Enter
			$(this).removeClass('maximize');
			$(this).scrollTop(10000);
			return false;
		}
	});

	$('.important').bind('unlock', function(){
		$(this).removeClass('lock').attr('readonly', false);
		$(this).siblings('.unlock_btn').remove();
	})

	initSwitcher();
	initUploader();
</script>