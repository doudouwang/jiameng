<?php /* Smarty version 2.6.26, created on 2012-04-23 10:14:00
         compiled from admin/component.tpl */ ?>
<h2>组件管理</h2>
<p class='btns'>
	<a href="?m=component.add"> + 新增组件</a> &nbsp;&nbsp;
</p>
<table class='grid_table'>
	<tr>
		<th width='5%'>&nbsp;</th>
		<th width='20%'>ID</th>
		<th>描述</th>
		<th width='10%'>类型</th>
		<th>操作</th>
	</tr>
	<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	<tr>
		<td><?php echo $this->_tpl_vars['item']['cid']; ?>
</td>
		<td><?php echo $this->_tpl_vars['item']['token']; ?>
</td>
		<td><?php echo $this->_tpl_vars['item']['desc']; ?>
</td>
		<td><?php echo $this->_tpl_vars['item']['type']; ?>
</td>
		<td>
			<a href='?m=component.edit&id=<?php echo $this->_tpl_vars['item']['cid']; ?>
'>修改</a>
			<a href='?m=component.preview&id=<?php echo $this->_tpl_vars['item']['cid']; ?>
' target='_blank'>预览</a>
			&nbsp;
			<a href='?m=component.del&id=<?php echo $this->_tpl_vars['item']['cid']; ?>
' class='del_btn'>删除</a>
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>