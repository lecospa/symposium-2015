{extends file='others.tpl'}
{block name=main}
<div class="page-header">
	<h1>Parallel Session &dash; {$session.title|escape} ({$session.abbreviation|escape})</h1>
</div>
<h2>Organizer(s):</h2>
{foreach $organizers as $organizer}
<div class="media">
	<div class="media-left">
		<div style="max-height: 100px;">
		{if $organizer.img}
			<img class="img-responsive img-thumbnail" src="{$smarty.const.TOP}/uploads/{$organizer.img}" />
		{/if}
		</div>
	</div>
	<div class="media-body">
		<h4 class="media-heading">{$organizer.first_name|escape} {$organizer.last_name|escape} (Email: {$organizer.email|escape})</h4>
	</div>
</div>
{/foreach}

<h2>Date & Time, Location 1: </h2><p>{$session.date_time_1|escape}, {$session.location_1|escape}</p>
<h2>Date & Time, Location 2: </h2><p>{$session.date_time_2|escape}, {$session.location_2|escape}</p>
<hr>
{foreach $session.talks as $talk}
	<h2 id="talk-{$talk.id}">Expected Speakers {$talk@iteration}:</h2>
	<p>{$talk.speaker.first_name|escape} {$talk.speaker.last_name|escape} ({$talk.speaker.email|escape})</p>
	<dl class="dl-horizontal">
		<dt>Duration of talk</dt><dd>{$talk.address_datetime|escape}</dd>
		<dt>Talk Time</dt><dd>{$talk.talk_time|escape}</dd>
		<dt>Talk Title</dt><dd>{$talk.title|escape}</dd>
		<dt>Talk Abstract</dt><dd>{$talk.abstract|escape|nl2br}</dd>
	</dl>
{/foreach}
{/block}
