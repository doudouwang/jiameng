<?php /* Smarty version 2.6.26, created on 2014-04-22 21:23:33
         compiled from main.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php if ($this->_tpl_vars['title']): ?> <?php echo $this->_tpl_vars['title']; ?>
 - 中国加盟网(连锁) <?php else: ?> 中国加盟网(连锁) <?php endif; ?>
</title>
<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" /> 
<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
<link href="<?php echo $this->_tpl_vars['img_domain']; ?>
/css/jm.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo $this->_tpl_vars['img_domain']; ?>
/css/css_style.css" type="text/css"/>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['img_domain']; ?>
/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['img_domain']; ?>
/js/jquery.plugins.js"></script>
<script type="text/javascript" src="/js/q.js"></script>
<!--公用文件-->
<script type='text/javascript' src='http://js.adm.cnzz.net/js/abase.js'></script>
<link rel="shortcut icon" href="/favicon.ico" />
</header>
<body>
<!--头部-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--主体-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['tpl']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--底部-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>
