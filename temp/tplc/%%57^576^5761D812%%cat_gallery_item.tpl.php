<?php /* Smarty version 2.6.26, created on 2012-04-18 22:59:14
         compiled from cat_gallery_item.tpl */ ?>
<td width="359" valign="top" style="border-bottom: #d6d6d6 1px dashed;">
<table width="359" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="4" class="jm_text" style="padding: 10px 0px 4px 0px;"><a href="/c<?php echo $this->_tpl_vars['key']; ?>
/"><?php echo $this->_tpl_vars['item']['name']; ?>
加盟</a></td>
		</tr>
		<tr>
			<?php $this->assign('count2', 0); ?>
			<?php $_from = $this->_tpl_vars['item']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub_key'] => $this->_tpl_vars['sub_item']):
?>
				<?php $this->assign('count2', $this->_tpl_vars['count2']+1); ?>
				<td width="89" height="26"><a href="/project/<?php echo $this->_tpl_vars['sub_item']['project_id']; ?>
.html" target='_blank'><?php echo $this->_tpl_vars['sub_item']['name']; ?>
</a></td>
				<?php if ($this->_tpl_vars['count2'] % 4 == 0): ?>
					</tr>
					<tr>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
</table>
</td>