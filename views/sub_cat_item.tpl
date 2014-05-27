<div class="list_info">
	<p class="name"><a href="/c<{$key}>/"><{$item.name}>加盟</a></p>
	<p class="leibie">
	<{foreach from=$all_cats.$key.sub key=sub_key item=sub_item}>
		<a href="/c<{$sub_item.cat_id}>/" target='_blank'><{$sub_item.name}></a>
	<{/foreach}></p>
</div>