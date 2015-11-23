{extends file='others.tpl'}
{block name=main}
<div class="page-header">
	<h1>Plenary Session</h1>
</div>
<div class="media">
	<div class="media-left">
		<img src="{$smarty.const.TOP}/uploads/{$talk.person.img}" style="width: 150px;" class="img-rounded">
	</div>
	<div class="media-body">
		<h2>{$talk.person.first_name|escape} {$talk.person.last_name|escape}</h2>
		<p>{$talk.person.email|escape}</p>
	</div>
</div>
<h2>Talk Title</h2>
<p>{$talk.title|escape}</p>
<h2>Talk Abstract</h2>
<p>{$talk.abstract|escape|nl2br}</p>

{/block}
