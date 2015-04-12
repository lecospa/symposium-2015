{extends file='bootstrap.html'}

{block name=head}{strip}
	<link href="{$smarty.const.TOP}css/docs.css" rel="stylesheet">
{/strip}{/block}

{block name=body}{strip}
<div class="navbar navbar-fixed-top top-bar" role="navigation" style="border: 3px yellow solid;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{$smarty.const.TOP}">LeCosPA</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="{$smarty.const.TOP}registration.php">Registration</a></li>
				<li><a href="#">Committee</a></li>
				<li><a href="{$smarty.const.TOP}ispeakers.php">Invited Speaker</a></li>
				{*<li><a href="#">Talk Submission</a></li>*}
				<li><a href="#">Program</a></li>
				{*<li><a href="#">Social Activities</a></li>*}
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Visiting<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{$smarty.const.TOP}visiting.php">Visiting Taiwan</a></li>
						<li><a href="#">Accommodation</a></li>
					</ul>
				</li>
				<li><a href="#">Photos</a></li>
			</ul>
		</div>
	</div>
</div>
{block name=main}{/block}
{/strip}{/block}

{block name=body_script}
	<script src="{$smarty.const.TOP}js/application.js"></script>
{/block}
