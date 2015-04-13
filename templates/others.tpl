{extends file='bootstrap.html'}

{block name=head}{strip}
	<link href="{$smarty.const.TOP}css/docs.css" rel="stylesheet">
{/strip}{/block}

{block name=body}{strip}
<div class="navbar navbar-fixed-top top-bar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://lecospa.ntu.edu.tw/">LeCosPA</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				{include file='menu-part.tpl'}
			</ul>
		</div>
	</div>
</div>
{block name=main}{/block}
{/strip}{/block}

{block name=body_script}
	<script src="{$smarty.const.TOP}js/application.js"></script>
{/block}
