<h2>信息汇总</h2>
<table class='datatable' style='margin-top:10px;'>
	<{foreach from=$sys_info key=key item=value}>
	<tr>
		<td width='120' style='text-align:right;padding-right:10px;'><{$key}></td>
		<td><{$value}></td>
	</tr>
	<{/foreach}>
</table>