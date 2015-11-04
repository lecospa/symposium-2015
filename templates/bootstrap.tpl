<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Symposium,LeCosPA,Everything about Gravity" />
	<meta name="description" content="Celebrating the Centenary of Einstein's General Relativity, Dec, 14-18, 2015, NTU, Taiwan" />
	<meta property="og:title" content="{block name=title}Second LeCosPA Symposium{/block}" />
	<meta property="og:url" content="http://lecospa.ntu.edu.tw/symposium/2015/" />
    <title>{block name=title}Second LeCosPA Symposium{/block}</title>
	<link href="{$smarty.const.TOP}/css/{block name=bootstrap_theme}bootstrap-darkly.min.css{/block}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	{block name=head}{/block}
  </head>
  {strip}<body class="container-fluid">
    {literal}
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-56608889-2', 'auto');
    ga('send', 'pageview');
    </script>
    {/literal}
    {block name=body}{/block}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{$smarty.const.TOP}/js/bootstrap.min.js"></script>
    {block name=body_script}{/block}
  </body>{/strip}
</html>
