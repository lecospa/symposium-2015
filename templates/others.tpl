{extends file='bootstrap.html'}
{block name=head}
<link href="css/docs.css" rel="stylesheet">
{/block}

{block name=body}
<div class="navbar navbar-fixed-top top-bar" role="navigation" style="border: 3px yellow solid;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../">Lecospa</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			</ul>
		</div>
	</div>
</div>
{block name=main}{/block}

{/block}

{block name=body_script}{literal}
<script src="js/application.js"></script>
{/literal}{/block}
