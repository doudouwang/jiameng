<?php /* Smarty version 2.6.26, created on 2013-11-24 11:27:44
         compiled from sub_cat_item.tpl */ ?>
<div class="list_info">
	<p class="name"><a href="/c<?php echo $this->_tpl_vars['key']; ?>
/"><?php echo $this->_tpl_vars['item']['name']; ?>
加盟</a></p>
	<p class="leibie">
	<?php $_from = $this->_tpl_vars['all_cats'][$this->_tpl_vars['key']]['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub_key'] => $this->_tpl_vars['sub_item']):
?>
		<a href="/c<?php echo $this->_tpl_vars['sub_item']['cat_id']; ?>
/" target='_blank'><?php echo $this->_tpl_vars['sub_item']['name']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?></p>
</div>