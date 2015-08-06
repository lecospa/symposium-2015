{extends file='bootstrap.html'}

{block name=head}
{*<meta http-equiv="refresh" content="10" />*}
<link href="{$smarty.const.TOP}css/responsive-full-background-image.css" rel="stylesheet">
{literal}
<style>
.nav > li > a {
	color: white;
	background-color: #333333;
}
.nav > li > a:hover, .nav > li > a:focus, .nav > li.active > a {
	background-color: white;
	color: black;
}
</style>
{/literal}
{/block}

{block name=body}{strip}
<div class="container">
	<div class="row">
		<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/08/symposium-header-9.png" class="img-responsive">	
	</div>
	<div class="row">
		<div class="col-xs-3">
			<ul class="nav nav-stacked">
				{include file='menu-part.tpl'}
			</ul>
		</div>
		<div class="col-xs-9" style="background-color: rgba(255, 255, 255, 0.6);">{block name=main}{/block}</div>
	</div>
	<div class="row">
		<h2>Sponsors and Supporters</h2>
		<div class="col-xs-4 col-sm-3 col-md-2">
			<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/07/ASIAA_Logo.png" class="img-responsive">
		</div>
		<div class="col-xs-4 col-sm-3 col-md-2">
			<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/07/phys_Logo.png" class="img-responsive">
		</div>
		<div class="col-xs-4 col-sm-3 col-md-2">
			<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/07/GSROC_Logo.png" class="img-responsive">
		</div>
		<div class="col-xs-4 col-sm-3 col-md-2">
			<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/07/CTS_Logo.png" class="img-responsive">
		</div>
		<div class="col-xs-4 col-sm-3 col-md-2">
			<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/07/NTU_Logo.png" class="img-responsive">
		</div>
		<div class="col-xs-4 col-sm-3 col-md-2">
			<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/07/NCTS_Logo.jpg" class="img-responsive">
		</div>
		<div class="col-xs-8 col-sm-6 col-md-4">
			<img src="http://lecospa.ntu.edu.tw/wp-content/uploads/2015/07/科技部_Logo.png" class="img-responsive">
		</div>
	</div>
</div>
{/strip}{/block}
