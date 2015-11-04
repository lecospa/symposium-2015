{extends file='bootstrap.tpl'}

{block name=title}Second LeCosPA Symposium - Admin{/block}
{block name=bootstrap_theme}bootstrap.min.css{/block}

{block name=head}
<link href="{$smarty.const.TOP}/css/admin.css" rel="stylesheet">
{/block}

{block name=body}
	<div class="row">
		<div id="main" class="col-sm-12" style="{block name=main_style}{/block}">{block name=main}{/block}</div>
	</div>
{/block}
