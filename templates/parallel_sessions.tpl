{extends file='others.tpl'}
{block name=main}
<div class="page-header">
	<h1>Parallel Sessions</h1>
</div>
<div class="alert alert-info" role="alert">
If you are interested in giving a talk in the following session(s), please contact the organizer(s) of that session. The organizer(s) has the right to arrange the time and the order for the session.
</div>
{foreach $sessions as $session}
<div class="panel panel-default">
	<div class="panel-heading">
		<a href="{$smarty.const.TOP}/parallel_session.php?id={$session.id}">{$session.title|escape} ({$session.abbreviation|escape})</a>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-3">Organizer</div>
			<div class="col-sm-9">
				{foreach $session.organizers as $organizer}
					{$organizer.first_name|escape} {$organizer.last_name|escape} ({$organizer.email|escape})
					{if not $organizer@last}<br>{/if}
				{/foreach}
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">Expected Speakers</div>
			<div class="col-sm-9">
				{foreach $session.talks as $talk}
					{$talk.speaker.first_name|escape} {$talk.speaker.last_name|escape}
					{if not $talk@last}, {/if}
				{/foreach}
			</div>
		</div>
	</div>
</div>
{/foreach}
	<div class="list-group">
	</div>
{/block}
