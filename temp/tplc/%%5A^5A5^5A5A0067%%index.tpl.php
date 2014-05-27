<?php /* Smarty version 2.6.26, created on 2012-04-23 10:13:58
         compiled from admin/index.tpl */ ?>
<h2>信息汇总</h2>
<table class='datatable' style='margin-top:10px;'>
	<?php $_from = $this->_tpl_vars['sys_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
	<tr>
		<td width='120' style='text-align:right;padding-right:10px;'><?php echo $this->_tpl_vars['key']; ?>
</td>
		<td><?php echo $this->_tpl_vars['value']; ?>
</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>