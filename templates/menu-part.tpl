<li {if $scope eq 'Index'}class="active"{/if}><a href="{$smarty.const.TOP}">Home</a></li>
<li {if $scope eq 'Registration'}class="active"{/if}><a href="{$smarty.const.TOP}registration.php">Registration</a></li>
<li {if $scope eq 'Committee'}class="active"{/if}><a href="{$smarty.const.TOP}committee.php">Committee</a></li>
<li {if $scope eq 'ISpeakers'}class="active"{/if}><a href="{$smarty.const.TOP}ispeakers.php">Invited Speaker</a></li>
{*<li><a href="#">Talk Submission</a></li>*}
<li {if $scope eq 'Program'}class="active"{/if}><a href="{$smarty.const.TOP}program.php">Program</a></li>
<li {if $scope eq 'Social'}class="active"{/if}><a href="{$smarty.const.TOP}social.php">Social Activities</a></li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Visiting<span class="caret"></span></a>
	<ul class="dropdown-menu" role="menu">
		<li {if $scope eq 'Visa'}class="active"{/if}><a href="{$smarty.const.TOP}visa.php">Visa</a></li>
		<li {if $scope eq 'Accommodation'}class="active"{/if}><a href="{$smarty.const.TOP}accommodation.php">Accommodation</a></li>
		<li {if $scope eq 'Transportations'}class="active"{/if}><a href="{$smarty.const.TOP}transportations.php">Transportations</a></li>
		<li {if $scope eq 'Map'}class="active"{/if}><a href="{$smarty.const.TOP}map.php">Map</a></li>
		<li {if $scope eq 'Others'}class="active"{/if}><a href="{$smarty.const.TOP}visiting.php">Others</a></li>
	</ul>
</li>
{*<li><a href="#">Photos</a></li>*}
