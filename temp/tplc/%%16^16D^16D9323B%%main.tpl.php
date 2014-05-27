<?php /* Smarty version 2.6.26, created on 2012-04-23 10:13:58
         compiled from admin/main.tpl */ ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<style type="text/css">
*{margin:0;padding:0;font-size:12px;font-family:Helvetica, "Microsoft Yahei", sans-serif;}
a{color:#3B59AA;text-decoration: none;}
a:hover{text-decoration: underline}
ul,li{list-style:none;}
#header{float:left; color:#bbb;height:60px;width:100%;clear:both;background:#f3f3f3;}
#logo{float:left;padding-left:50px;line-height:60px;}
#nav{width:100%;height:24px;float:left;line-height:24px;}
#nav_inner{float:right;padding-right:10px;}

#main{width:100%;float:left;}
#body_layout{width:100%;margin-bottom:20px;}
#body_menu{width:200px;padding-top:10px;vertical-align: top;}

#body_content{
	border:1px solid #000;
	background:#fefefe;
	padding:20px;
}

.datatable{width:100%;border-collapse: collapse;}
.datatable td{border:1px solid #ddd;padding:8px;}
.datatable *{font-size:14px;font-family:Consolas, "Courier New", Helvetica;}

#body_content h2{font-size:14px; height:30px;line-height:30px;	
   font-family: "lucida grande",tahoma,verdana,arial,sans-serif;}
#body_content p{line-height:24px;}
.body_menu_list{}
.body_menu_list li{width:160px;height:24px;
		  line-height:24px;float:right;}
.body_menu_list a{padding-left:30px;display:block;
		 text-decoration:none;color:#333333;}
.body_menu_list a:hover{background-color:#EFF2F7;}
.body_menu_list a.current{background-color:#D8DFEA;font-weight:bold;}


.grid_table{width:100%;border-collapse: collapse;table-layout: fixed}
.grid_table td ,.grid_table th{text-align:center;border:1px solid #ddd;padding:8px;}
.grid_table th{background:#f3f3f3;}
.grid_table *{font-size:12px;font-family:Consolas, "Courier New", Helvetica;}
.grid_table .highlight{background:#FFFFF3;}
.source_textarea{font-family: Consolas, "Courier New", Helvetica, sans-serif;border:1px solid #888;padding:3px;}
.container{float:left;width:100%;margin-bottom:10px;}
/*.createNew {float: right;margin: 15px;}*/
.btns{height:30px;}
</style>
<title>管理平台</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.upload.js"></script>
<script type="text/javascript" src="js/jquery.copy.js"></script>
<script type="text/javascript" src="js/xheditor-1.1.13-zh-cn.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('.grid_table tr').mouseover(function(){
			$(this).addClass('highlight');
		}).mouseout(function(){
			$(this).removeClass('highlight');
		});
		<?php if ($this->_tpl_vars['menu']): ?>
		var menu = '<?php echo $this->_tpl_vars['menu']; ?>
';
		$('.menu').removeClass('current');
		$('#menu_'+menu).addClass('current');
		<?php endif; ?>

		$('.del_btn').click(function(){
			return window.confirm('是否确认删除？');
		});
	});
</script>
</head>
<body>
	
<div id="header">
	<div id="logo"><h1>API 管理平台</h1></div>
</div>
<div id="nav">
	<div id="nav_inner">
		<strong>
			<?php  
				echo $_SESSION['admin_info']['name']; 
			 ?>
		</strong>，
		<a href='index.php?m=passport.logout'>登出</a>
	</div>
</div>
<div id="main">
	<table id="body_layout" cellspacing="0" cellpadding="0">
		<tr>
			<td id='body_menu'>
				<ul class='body_menu_list'>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</ul>
			</td>
			<td id='body_content'>
				<?php if ($this->_tpl_vars['tpl']): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/".($this->_tpl_vars['tpl']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
			</td>
		</tr>
	</table>
</div>
</body>
</html>