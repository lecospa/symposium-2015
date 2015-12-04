{extends file='bootstrap.tpl'}

{block name=head}
<link href="{$smarty.const.TOP}/css/responsive-full-background-image.css" rel="stylesheet">
<link href="{$smarty.const.TOP}/css/main.css" rel="stylesheet">
{/block}

{block name=body}
	<div class="row">
		<img src="{$smarty.const.IMGTOP}symposium_2015/1f4d0edb0362c8f241034f74d3699235-symposium-header-12.png" class="img-responsive center-block">	
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="list-group table-of-content">{include file='menu-part.tpl'}</div>
		</div>
		<div id="main" class="col-sm-9" style="{block name=main_style}{/block}">{block name=main}{/block}</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="text-align: center;">{include file='sponsors_and_supporters.html'}</div>
	</div>
{/block}
