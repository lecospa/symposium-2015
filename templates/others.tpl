{extends file='bootstrap.html'}

{block name=head}
<link href="{$smarty.const.TOP}/css/responsive-full-background-image.css" rel="stylesheet">
<link href="{$smarty.const.TOP}/css/main.css" rel="stylesheet">
{/block}

{block name=body}{strip}
	<div class="row">
		<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/08/symposium-header-12.png" class="img-responsive center-block">	
	</div>
	<div class="row">
		<div class="col-sm-3">
			<ul class="nav nav-stacked">
				{include file='menu-part.tpl'}
			</ul>
		</div>
		<div id="main" class="col-sm-9" style="{block name=main_style}{/block}">{block name=main}{/block}</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="text-align: center;">
			{include file='sponsors_and_supporters.html'}
		</div>
	</div>
{/strip}{/block}
