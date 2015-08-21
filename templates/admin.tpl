{extends file='bootstrap.html'}

{block name=title}Second LeCosPA Symposium - Admin{/block}

{block name=head}
{/block}

{block name=body}{strip}
	<div class="row">
		<div class="col-sm-2">
			<ul class="nav nav-stacked">
				{include file='admin-menu.tpl'}
			</ul>
		</div>
		<div id="main" class="col-sm-10" style="{block name=main_style}{/block}">{block name=main}{/block}</div>
	</div>
{/strip}{/block}
