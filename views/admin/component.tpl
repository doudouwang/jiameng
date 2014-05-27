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
	<{foreach from=$items item=item}>
	<tr>
		<td><{$item.cid}></td>
		<td><{$item.token}></td>
		<td><{$item.desc}></td>
		<td><{$item.type}></td>
		<td>
			<a href='?m=component.edit&id=<{$item.cid}>'>修改</a>
			<a href='?m=component.preview&id=<{$item.cid}>' target='_blank'>预览</a>
			&nbsp;
			<a href='?m=component.del&id=<{$item.cid}>' class='del_btn'>删除</a>
		</td>
	</tr>
	<{/foreach}>
</table>