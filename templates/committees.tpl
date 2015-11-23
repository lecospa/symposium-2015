{extends file='others.tpl'}
{block name=main}
<div class="page-header">
	<h1>International Advisory Committee</h1>
</div>
<div class="row">
	{foreach $committees['IACCHAIR'] as $person}
		{include file='committees.part.tpl' person=$person chair=true}
	{/foreach}
	{foreach $committees['IAC'] as $person}
		{include file='committees.part.tpl' person=$person}
	{/foreach}
</div>

<div class="page-header">
	<h1>Local Organizing Committee</h1>
</div>
<div class="row">
	{foreach $committees['LOCCHAIR'] as $person}
		{include file='committees.part.tpl' person=$person chair=true}
	{/foreach}
	{foreach $committees['LOC'] as $person}
		{include file='committees.part.tpl' person=$person}
	{/foreach}
</div>

{/block}
