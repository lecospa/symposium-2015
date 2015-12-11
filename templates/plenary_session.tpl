{extends file='others.tpl'}
{block name=main}
<div class="page-header">
	<h1>Plenary Session</h1>
</div>
<div class="media">
	<div class="media-left">
		<div style="width: 150px; height: 150px;">
			{if $talk.person.img}
			<img src="{$smarty.const.TOP}/uploads/{$talk.person.img}" class="img-rounded img-responsive">
			{/if}
		</div>
	</div>
	<div class="media-body">
		<h2>{$talk.person.first_name|escape} {$talk.person.last_name|escape}</h2>
		<p>{$talk.person.email|escape}</p>
	</div>
</div>
<h2>Title: {$talk.title|escape}</h2>
<h3>Date &amp; Time, Location</h3>
<p>{$talk.address_datetime|escape}, {$talk.location|escape}</p>
<h3>Talk Time</h3>
<p>{$talk.talk_time|escape}</p>
<h3>Talk Abstract</h3>
<p>{$talk.abstract|escape|nl2br}</p>
{if $talk.slide_file_show}
	<h3>Slide</h3>
	<p><a href="{$smarty.const.TOP}/uploads/{$talk.slide_file}">Download</a></p>
{/if}

{/block}
