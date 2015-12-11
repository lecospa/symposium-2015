{extends file='others.tpl'}
{block name=main}
<div class="page-header">
	<h1>Parallel Session &dash; {$session.title|escape} ({$session.abbreviation|escape})</h1>
</div>
<h2>Organizer(s):</h2>
{foreach $organizers as $organizer}
	<p>{$organizer.first_name|escape} {$organizer.last_name|escape} (Email: {$organizer.email|escape})</p>
{/foreach}

<h2>Date & Time, Location:</h2>
<ul>
{foreach $session.slots as $slot}
<li>{$slot.date_time|escape}, {$slot.location|escape}</li>
{/foreach}
</ul>

<hr>
{foreach $session.talks as $talk}
	<h2 id="talk-{$talk.id}">Expected Speakers {$talk@iteration}:</h2>
	<p>{$talk.speaker.first_name|escape} {$talk.speaker.last_name|escape} ({$talk.speaker.email|escape})</p>
	<dl class="dl-horizontal">
		{if $talk.slide_file_show}
			<dt>Slide</dt><dd><a href="{$smarty.const.TOP}/uploads/{$talk.slide_file|escape}">Download</a></dd>
		{/if}
		<dt>Talk Time</dt><dd>{$talk.address_datetime|escape}</dd>
		<dt>Duration of Talk</dt><dd>{$talk.talk_time|escape}</dd>
		<dt>Talk Title</dt><dd>{$talk.title|escape}</dd>
		<dt>Talk Abstract</dt><dd>{$talk.abstract|escape|nl2br}</dd>
	</dl>
{/foreach}
{/block}
