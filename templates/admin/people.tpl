{extends file='admin.tpl'}

{block name=main}
<div class="page-header">
	<h1>與會者管理後台</h1>
</div>

<ol class="breadcrumb">
	<li><a href="{$smarty.const.TOP}/admin/index.php">管理後台</a></li>
	<li class="active">與會者</li>
</ol>

<div class="table-responsive">
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>姓名</th>
			<th>Email</th>
			<th>Passcode</th>
			<th>Committee</th>
			<th>Sessions <span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Organizer</span></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		{foreach $people as $person}
		<tr>
			<td>{$person.first_name|escape} {$person.last_name|escape}</td>
			<td>{$person.email|escape}</td>
			<td>{foreach $person.tokens as $auth}
				<a href="{$smarty.const.TOP}/person/main.php?token={$auth.token}">{$auth.token}</a><br>
			{/foreach}</td>
			<td>{foreach $person.committees as $committee}
				{$committee.type}
			{/foreach}</td>
			<td>{foreach $person.talks as $talk}
				{if $talk.session eq 'Plenary'}
					<a href="{$smarty.const.TOP}/plenary_sessions/{$talk.id}" class="label label-{if $talk.title eq ''}default{else}success{/if}">Plenary</a>
				{elseif $talk.session eq 'Parallel'}
					<a href="{$smarty.const.TOP}/admin/parallel_session.php?mode=edit&session_id={$talk.session_id}" class="label label-{if $talk.title eq ''}default{else}success{/if}">{$sessions[$talk.session_id].abbreviation|escape}</a>
				{elseif $talk.session eq 'Poster'}
					<span class="label label-default">{$talk.session}</span>
				{/if}
			{/foreach}
			{foreach $person.organizers as $organizer}
				<a href="{$smarty.const.TOP}/admin/parallel_session.php?mode=edit&session_id={$organizer.session_id}" class="label label-primary">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span> {$sessions[$organizer.session_id].abbreviation|escape}
				</a>
			{/foreach}</td>
			<td><a class="btn btn-default" href="{$smarty.const.TOP}/admin/person.php?id={$person.id}&mode=edit">編輯</a></td>
			<td>
				<form method="POST" action="{$smarty.const.TOP}/admin/person.php?person_id={$person.id}&method=delete">
					<button class="btn btn-danger" onClick="return confirm('確定刪除？將會損失此人的所有資料、演講資訊');">刪除</button>
				</form>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>
</div>

<h2>新增</h2>
<form class="form-inline" action="{$smarty.const.TOP}/admin/person.php" method="POST">
<div class="table-responsive">
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>參加 Session</th>
			<th>姓名</th>
			<th>Email</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<select class="form-control" name="session" required>
					<option value=""></option>
					<option value="Normal">Attendee</option>
					<option value="Plenary">Plenary Session Speaker</option>
					<option value="Parallel">Parallel Session Speaker</option>
					<option value="Poster">Poster</option>
				</select>
			</td>
			<td>
				<input type="text" class="form-control" name="first_name" placeholder="First Name" required>
				<input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
			</td>
			<td><input type="email" class="form-control" name="email" placeholder="Speaker Email"></td>
			<td><button type="submit" class="btn btn-primary">新增</button></td>
		</tr>
	</tbody>
</table>
</div>
</form>
{/block}
