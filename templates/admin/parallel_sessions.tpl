{extends file='admin.tpl'}

{block name=main}
<div class="page-header">
	<h1>Parallel Sessions</h1>
</div>
<ol class="breadcrumb">
	<li><a href="{$smarty.const.TOP}/admin/index.php?token={$token}">管理後台</a></li>
	<li class="active">Parallel Sessions</li>
</ol>
{foreach $sessions as $session}
<div class="panel panel-default">
	<div class="panel-heading">{$session.title|escape} ({$session.abbreviation|escape}) <a href="{$smarty.const.TOP}/admin/parallel_session.php?mode=edit&session_id={$session.id}&token={$token}" class="pull-right">編輯</a></div>
	<div class="panel-body">
		<p>Organizers
		{foreach $session.organizers as $organizer}
			<span class="label label-default">{$organizer.content.first_name|escape} {$organizer.content.last_name|escape}</span>
		{/foreach}
		</p>
		<p>Speakers
		{foreach $session.talks as $talk}
			<span class="label label-default">{$talk.person.first_name|escape} {$talk.person.last_name|escape}</span>
		{/foreach}
		</p>
	</div>
</div>
{/foreach}

{/block}
