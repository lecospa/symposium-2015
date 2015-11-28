{extends file='admin.tpl'}

{block name=head append}
{/block}

{block name=main}
<div class="page-header">
	<h1>Parallel Sessions <small>{$session.title|escape} ({$session.abbreviation|escape})</small></h1>
</div>
<ol class="breadcrumb">
	<li><a href="{$smarty.const.TOP}/admin/index.php?token={$token}">管理後台</a></li>
	<li><a href="{$smarty.const.TOP}/admin/parallel_sessions.php?token={$token}">Parallel Sessions</a></li>
	<li class="active">編輯</li>
</ol>

{* person part *}

<div class="row">
	<div class="col-xs-2"><label for="title-input">Session 標題</label></div>
	<div class="col-xs-4">
		<input id="title-input" data-method="POST" data-action="{$smarty.const.TOP}/api/session/title.php?token={$token}&session_id={$session.id}&method=patch" class="form-control" type="text" value="{$session.title|escape}">
	</div>
	<div class="col-xs-1"><label for="abbreviation-input">縮寫</label></div>
	<div class="col-xs-1">
		<input id="abbreviation-input" data-method="POST" data-action="{$smarty.const.TOP}/api/session/abbreviation.php?token={$token}&session_id={$session.id}&method=patch" class="form-control" type="text" value="{$session.abbreviation|escape}">
	</div>
</div>
<div class="row">
	<div class="col-xs-2"><label for="location-input">地點</label></div>
	<div class="col-xs-3">
		<input id="location-input" data-method="POST" data-action="{$smarty.const.TOP}/api/session/location.php?token={$token}&session_id={$session.id}&method=patch" class="form-control" type="text" value="{$session.location|escape}">
	</div>
</div>
<div class="row">
	<div class="col-xs-2"><label>Date &amp; time</label></div>
	<div class="col-xs-2">
		<input id="date-input" data-method="POST" data-action="{$smarty.const.TOP}/api/parallel_session/date.php?token={$token}&session_id={$session.id}&method=patch" class="form-control" type="text" value="{$session.date|escape}" placeholder="Month. Date">
	</div>
	<div class="col-xs-2">
		<input id="time-input" data-method="POST" data-action="{$smarty.const.TOP}/api/parallel_session/time.php?token={$token}&session_id={$session.id}&method=patch" class="form-control" type="text" value="{$session.time|escape}" placeholder="00:00-24:00">
	</div>
</div>

{* organizers part *}

<h2>Organizers</h2>
<table class="table">
	<thead>
		<tr><th>姓名</th><th></th><th></th></tr>
	</thead>
	<tbody>
		{foreach $session.organizers as $organizer}
		<tr>
			<td>{$organizer.content.first_name|escape} {$organizer.content.last_name|escape}</td>
			<td><a href="{$smarty.const.TOP}/admin/person.php?token={$token}&id={$organizer.content.id}&mode=edit" class="btn btn-default">編輯</a></td>
			<td>
				<button class="btn btn-danger organizer-delete-button" data-method="POST" data-action="{$smarty.const.TOP}/api/session/organizer.php?token={$token}&session_id={$organizer.session_id}&id={$organizer.id}&method=delete">刪除</button>
			</td>
		</tr>
		{/foreach}
		<tr>
			<form action="{$smarty.const.TOP}/admin/session/insert.php?token={$token}" method="POST">
				<td>
					<label>選擇一個Parallel Session的人</label>
					<input type="hidden" name="session_id" value="{$session.id}">
					<input type="hidden" name="name" value="organizer">
					<select class="form-control" name="value" required>
						<option value=""></option>
						{foreach $people as $person}
						<option value="{$person.id}">{$person.first_name|escape} {$person.last_name|escape}</option>
						{/foreach}
					</select>
				</td>
				<td><button type="submit" class="btn btn-default">新增</button></td>
				<td></td>
			</form>
		</tr>
	</tbody>
</table>
<h2>Speakers</h2>
<table class="table">
	<thead>
		<tr><th>姓名</th><th></th><th style="width: 100px;">順序</th><th></th><th></th></tr>
	</thead>
	<tbody>
		{foreach $session.talks as $talk}
		<tr>
			<td>{$talk.speaker.first_name|escape} {$talk.speaker.last_name|escape}</td>
			<td>{$talk.address_datetime|escape} / {$talk.talk_time|escape}</td>
			<td>
				<input class="session-ordering-input form-control" data-method="POST" data-action="{$smarty.const.TOP}/api/session/talk/session_ordering.php?token={$token}&session_id={$session.id}&talk_id={$talk.id}&method=patch" type="text" value="{$talk.session_ordering}">
			</td>
			<td><a href="{$smarty.const.TOP}/admin/person.php?token={$token}&id={$talk.speaker.id}&mode=edit" class="btn btn-default">編輯</a></td>
			<td>
				<form method="POST" action="{$smarty.const.TOP}/admin/parallel_session/talk.php?token={$token}&session_id={$session.id}&talk_id={$talk.id}&method=delete">
					<button class="btn btn-danger" onClick="return confirm('確定刪除？');">刪除</button>
				</form>
			</td>
		</tr>
		{/foreach}
		<tr>
			<form action="{$smarty.const.TOP}/admin/parallel_session/talk.php?token={$token}&session_id={$session.id}" method="POST">
				<td colspan="2">
					<label>選擇一個Parallel Session的人</label>
					<select class="form-control" name="person_id" required>
						<option value=""></option>
						{foreach $people as $person}
						<option value="{$person.id}">{$person.first_name|escape} {$person.last_name|escape}</option>
						{/foreach}
					</select>
				</td>
				<td><button type="submit" class="btn btn-primary">新增</button></td>
				<td></td>
				<td></td>
			</form>
		</tr>
	</tbody>
</table>

{/block}

{block name=body_script}
<script src="{$smarty.const.TOP}/js/admin/parallel_session.edit.js"></script>
{/block}
