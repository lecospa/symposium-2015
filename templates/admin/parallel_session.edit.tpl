{extends file='admin.tpl'}

{block name=head append}
{/block}

{block name=main}
<div class="page-header">
	<h1>Parallel Sessions <small>{$session.title|escape} ({$session.abbreviation|escape})</small></h1>
</div>
<ol class="breadcrumb">
	<li><a href="{$smarty.const.TOP}/admin/index.php">管理後台</a></li>
	<li><a href="{$smarty.const.TOP}/admin/parallel_sessions.php">Parallel Sessions</a></li>
	<li class="active">編輯</li>
</ol>

{* person part *}

<div class="form-horizontal">
	<div class="form-group">
		<label for="title-input" class="col-xs-2 control-label">Session 標題</label>
		<div class="col-xs-4">
			<input id="title-input" data-method="POST" data-action="{$smarty.const.TOP}/api/session/title.php?session_id={$session.id}&method=patch" data-field="title"
 class="form-control" type="text" value="{$session.title|escape}">
		</div>
		<label class="col-xs-1 control-label" for="abbreviation-input">縮寫</label>
		<div class="col-xs-1">
			<input id="abbreviation-input" data-method="POST" data-action="{$smarty.const.TOP}/api/session/abbreviation.php?session_id={$session.id}&method=patch" data-field="abbreviation"
	 class="form-control" type="text" value="{$session.abbreviation|escape}">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-2 control-label" for="date-time-1-input">日期時間 1</label>
		<div class="col-xs-3">
			<input id="date-time-1-input" data-method="POST" data-action="{$smarty.const.TOP}/api/parallel_session/date_time_1.php?session_id={$session.id}&method=patch" data-field="date_time_1" class="form-control" type="text" value="{$session.date_time_1|escape}">
		</div>
		<label class="col-xs-1 control-label" for="location-1-input">地點 1</label>
		<div class="col-xs-3">
			<input id="location-1-input" data-method="POST" data-action="{$smarty.const.TOP}/api/session/location_1.php?session_id={$session.id}&method=patch" data-field="location_1" class="form-control" type="text" value="{$session.location_1|escape}">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-2 control-label" for="date-time-2-input">日期時間 2</label>
		<div class="col-xs-3">
			<input id="date-time-2-input" data-method="POST" data-action="{$smarty.const.TOP}/api/parallel_session/date_time_2.php?session_id={$session.id}&method=patch" data-field="date_time_2" class="form-control" type="text" value="{$session.date_time_2|escape}">
		</div>
		<label class="col-xs-1 control-label" for="location-2-input">地點 2</label>
		<div class="col-xs-3">
			<input id="location-2-input" data-method="POST" data-action="{$smarty.const.TOP}/api/session/location_2.php?session_id={$session.id}&method=patch" data-field="location_2" class="form-control" type="text" value="{$session.location_2|escape}">
		</div>
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
			<td><a href="{$smarty.const.TOP}/admin/person.php?id={$organizer.content.id}&mode=edit" class="btn btn-default">編輯</a></td>
			<td>
				<button class="btn btn-danger organizer-delete-button" data-method="POST" data-action="{$smarty.const.TOP}/api/session/organizer.php?session_id={$organizer.session_id}&id={$organizer.id}&method=delete">刪除</button>
			</td>
		</tr>
		{/foreach}
		<tr>
			<form action="{$smarty.const.TOP}/admin/session/insert.php" method="POST">
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
		<tr><th>姓名</th><th></th><th style="width: 100px;">順序</th><th style="width: 100px;"></th><th style="width: 100px;"></th><th style="width: 100px;"></th></tr>
	</thead>
	<tbody>
		{foreach $session.talks as $talk}
		<tr>
			<td>{$talk.speaker.first_name|escape} {$talk.speaker.last_name|escape}</td>
			<td>{$talk.address_datetime|escape} / {$talk.talk_time|escape}</td>
			<td>
				<input class="session-ordering-input form-control" data-method="POST" data-action="{$smarty.const.TOP}/api/session/talk/session_ordering.php?session_id={$session.id}&talk_id={$talk.id}&method=patch" data-field="session_ordering"
 type="text" value="{$talk.session_ordering}">
			</td>
			<td>{if $talk.slide_file neq ''}
				<a href="{$smarty.const.TOP}/uploads/{$talk.slide_file}" class="btn btn-default"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 投影片</a>
			{/if}</td>
			<td><a href="{$smarty.const.TOP}/admin/person.php?id={$talk.speaker.id}&mode=edit" class="btn btn-default">編輯</a></td>
			<td>
				<form method="POST" action="{$smarty.const.TOP}/admin/parallel_session/talk.php?session_id={$session.id}&talk_id={$talk.id}&method=delete">
					<button class="btn btn-danger" onClick="return confirm('確定刪除？');">刪除</button>
				</form>
			</td>
		</tr>
		{/foreach}
		<tr>
			<form action="{$smarty.const.TOP}/admin/parallel_session/talk.php?session_id={$session.id}" method="POST">
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
				<td></td>
			</form>
		</tr>
	</tbody>
</table>

{/block}

{block name=body_script}
<script src="{$smarty.const.TOP}/js/admin/edit.js"></script>
<script src="{$smarty.const.TOP}/js/admin/parallel_session.edit.js"></script>
{/block}
