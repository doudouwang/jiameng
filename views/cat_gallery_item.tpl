<td width="359" valign="top" style="border-bottom: #d6d6d6 1px dashed;">
<table width="359" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="4" class="jm_text" style="padding: 10px 0px 4px 0px;"><a href="/c<{$key}>/"><{$item.name}>加盟</a></td>
		</tr>
		<tr>
			<{assign var=count2 value=0}>
			<{foreach from=$item.items key=sub_key item=sub_item}>
				<{assign var=count2 value=$count2+1}>
				<td width="89" height="26"><a href="/project/<{$sub_item.project_id}>.html" target='_blank'><{$sub_item.name}></a></td>
				<{if $count2 %4 == 0}>
					</tr>
					<tr>
				<{/if}>
			<{/foreach}>
		</tr>
</table>
</td>