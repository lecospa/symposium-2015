{extends file='bootstrap.html'}

{block name=head}
<link href="css/responsive-full-background-image.css" rel="stylesheet">
<link href="css/homepage.css" rel="stylesheet">
{/block}

{block name=body}
{strip}

{* 導覽列 *}
<nav class="navbar navbar-default">
<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="http://lecospa.ntu.edu.tw/symposium/2015/">Lecospa</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav ">
			<li><a href="#">Bulletin</a></li>
			<li><a href="#">Registration</a></li>
			<li><a href="#">Committee</a></li>
			<li><a href="#">Invited Speaker</a></li>
			{*<li><a href="#">Talk Submission</a></li>
			<li><a href="#">Program</a></li>
			<li><a href="#">Social Activities </a></li>
			<li><a href="#">Visiting Taiwan</a></li>
			<li><a href="#">Accommodation</a></li>
			<li><a href="#">Photo Gallery</a></li>*}
		</ul>
	</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
{/strip}

<div class="container">
	<div id="header">Put Lecospa Logo (TBD)</div>
	<div id="bulletin">
		<div class="item">Things 1</div>
		<div class="item">Things 2</div>
		<div class="item">Things 3</div>
	</div>
</div>

{/block}


{block name=body_script}{literal}
<script src="js/masonry.pkgd.min.js"></script>
<script>
var container = document.querySelector('#bulletin');
var msnry = new Masonry( container, {
  // options
  columnWidth: 200,
  itemSelector: '.item'
});
</script>
{/literal}{/block}