<li {if $scope eq 'registration'}class="active"{/if}><a href="{$smarty.const.TOP}registration.php">Registration</a></li>
<li {if $scope eq 'social'}class="committee"{/if}><a href="#">Committee</a></li>
<li {if $scope eq 'ispeakers'}class="active"{/if}><a href="{$smarty.const.TOP}ispeakers.php">Invited Speaker</a></li>
{*<li><a href="#">Talk Submission</a></li>*}
<li {if $scope eq 'program'}class="active"{/if}><a href="{$smarty.const.TOP}program.php">Program</a></li>
<li {if $scope eq 'social'}class="active"{/if}><a href="{$smarty.const.TOP}social.php">Social Activities</a></li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Visiting<span class="caret"></span></a>
	<ul class="dropdown-menu" role="menu">
		<li {if $scope eq 'visiting'}class="active"{/if}><a href="{$smarty.const.TOP}visiting.php">Visiting Taiwan</a></li>
		<li {if $scope eq 'accommodation'}class="active"{/if}><a href="#">Accommodation</a></li>
		<li {if $scope eq 'map'}class="active"{/if}><a href="{$smarty.const.TOP}map.php">Map</a></li>
	</ul>
</li>
{*<li><a href="#">Photos</a></li>*}
