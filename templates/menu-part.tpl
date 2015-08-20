{strip}
<li {if $scope eq 'Index'}class="active"{/if}><a href="{$smarty.const.TOP}">Home</a></li>
<li {if $scope eq 'Committee'}class="active"{/if}><a href="{$smarty.const.TOP}committee.php">Committees</a></li>
<li {if $scope eq 'Topics'}class="active"{/if}><a href="{$smarty.const.TOP}topics.php">Topics</a></li>
<li {if $scope eq 'Program'}class="active"{/if}><a href="{$smarty.const.TOP}program.php">Conference Program</a></li>
<li {if $scope eq 'Plenary'}class="active"{/if}><a href="{$smarty.const.TOP}plenary_speakers.php">Plenary Session</a></li>
<li {if $scope eq 'I2Speakers'}class="active"{/if}><a href="{$smarty.const.TOP}i2speakers.php">Parallel Session</a></li>
<li {if $scope eq 'Registration'}class="active"{/if}><a href="{$smarty.const.TOP}registration.php">Registration</a></li>
<li {if $scope eq ''}class="active"{/if}><a href="{$smarty.const.TOP}no.php">Title &amp; Abstract Submission</a></li>
<li {if $scope eq 'Participants'}class="active"{/if}><a href="{$smarty.const.TOP}participants.php">List of Participants</a></li>
<li {if $scope eq 'Accommodation'}class="active"{/if}><a href="{$smarty.const.TOP}accommodation.php">Accommodation</a></li>
<li {if $scope eq 'Transportations'}class="active"{/if}><a href="{$smarty.const.TOP}transportations.php">Transportations</a></li>
<li {if $scope eq 'Social'}class="active"{/if}><a href="{$smarty.const.TOP}social.php">Social Events</a></li>
<li {if $scope eq 'Companion'}class="active"{/if}><a href="{$smarty.const.TOP}companion_program.php">Companion Program</a></li>
<li {if $scope eq 'About_Taiwan'}class="active"{/if}><a href="{$smarty.const.TOP}about_taiwan.php">Information about Taiwan</a></li>
<li {if $scope eq 'Travel_Visa'}class="active"{/if}><a href="{$smarty.const.TOP}travel_and_visa.php">Travel &amp; Visa Information</a></li>
<li {if $scope eq 'Photos'}class="active"{/if}><a href="{$smarty.const.TOP}photos.php">Conference Photos</a></li>
<li {if $scope eq 'Publications'}class="active"{/if}><a href="{$smarty.const.TOP}publications.php">Publications</a></li>
<li><a href="http://lecospa.ntu.edu.tw">Back to LeCosPA</a></li>
{/strip}
