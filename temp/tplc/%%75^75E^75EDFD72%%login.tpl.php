<?php /* Smarty version 2.6.26, created on 2012-04-23 10:16:15
         compiled from admin/login.tpl */ ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<form method='post'>
	<?php if ($this->_tpl_vars['error']): ?>
	<span style='color:red;font-weight:bold;'><?php echo $this->_tpl_vars['error']; ?>
</span><br/>
	<?php endif; ?>
	username:<br/>
	<input type="text" name="username" id="" /><br/><br/>
	password:<br/>
	<input type="password" name="password" id="" /><br/><br/>
	<input type="hidden" name="backurl" value="<?php echo $this->_tpl_vars['backurl']; ?>
" />
	<input type="submit" value="Login" />
</form>