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
		<dl class="dl-horizontal">
			<dt>Date &amp; Time 1</dt><dd>{$session.date_time_1}</dd>
			<dt>Date &amp; Time 2</dt><dd>{$session.date_time_2}</dd>
			<dt>Organizers <span class="badge">{$session.organizers|count}</span></dt>
			<dd>
			{foreach $session.organizers as $organizer}
				{$organizer.content.first_name|escape} {$organizer.content.last_name|escape}{if not $organizer@last}, {/if}
			{/foreach}
			</dd>
			<dt>Speakers <span class="badge">{$session.talks|count}</span></dt>
			<dd>
			{foreach $session.talks as $talk}
				{$talk.person.first_name|escape} {$talk.person.last_name|escape}{if not $talk@last}, {/if}
			{/foreach}
			</dd>
		</dl>
	</div>
</div>
{/foreach}

{/block}
