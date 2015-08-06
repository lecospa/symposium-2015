{strip}
<li {if $scope eq 'Index'}class="active"{/if}><a href="{$smarty.const.TOP}">Home</a></li>
<li {if $scope eq 'Committee'}class="active"{/if}><a href="{$smarty.const.TOP}committee.php">Committee</a></li>
<li {if $scope eq 'Topics'}class="active"{/if}><a href="{$smarty.const.TOP}topics.php">Topics</a></li>
<li {if $scope eq 'ISpeakers'}class="active"{/if}><a href="{$smarty.const.TOP}ispeakers.php">Plenary Session Speakers</a></li>
<li {if $scope eq 'I2Speakers'}class="active"{/if}><a href="{$smarty.const.TOP}i2speakers.php">Parallel Session Organizers and Speakers</a></li>
<li {if $scope eq 'Program'}class="active"{/if}><a href="{$smarty.const.TOP}program.php">Conference Program</a></li>
<li {if $scope eq 'Registration'}class="active"{/if}><a href="{$smarty.const.TOP}registration.php">Registration</a></li>
<li {if $scope eq ''}class="active"{/if}><a href="{$smarty.const.TOP}no.php">Title &amp; Abstract Submission</a></li>
<li {if $scope eq ''}class="active"{/if}><a href="{$smarty.const.TOP}no.php">List of Participants</a></li>
<li {if $scope eq 'Accommodation'}class="active"{/if}><a href="{$smarty.const.TOP}accommodation.php">Accommodation</a></li>
<li {if $scope eq 'Transportations'}class="active"{/if}><a href="{$smarty.const.TOP}transportations.php">Transportations</a></li>
<li {if $scope eq 'Social'}class="active"{/if}><a href="{$smarty.const.TOP}social.php">Social Events</a></li>
<li {if $scope eq 'Companion'}class="active"{/if}><a href="{$smarty.const.TOP}companion_program.php">Companion Program</a></li>
<li {if $scope eq 'About_Taiwan'}class="active"{/if}><a href="{$smarty.const.TOP}about_taiwan.php">Information about Taiwan</a></li>
<li {if $scope eq 'Travel_Visa'}class="active"{/if}><a href="{$smarty.const.TOP}travel_and_visa.php">Travel &amp; Visa Information</a></li>
<li {if $scope eq 'Photos'}class="active"{/if}><a href="{$smarty.const.TOP}photos.php">Conference Photos</a></li>
{*<li {if $scope eq 'Visa'}class="active"{/if}><a href="{$smarty.const.TOP}visa.php">Visa</a></li>
<li {if $scope eq 'Map'}class="active"{/if}><a href="{$smarty.const.TOP}map.php">Map</a></li>
<li {if $scope eq 'Others'}class="active"{/if}><a href="{$smarty.const.TOP}visiting.php">Others</a></li>*}
{/strip}
