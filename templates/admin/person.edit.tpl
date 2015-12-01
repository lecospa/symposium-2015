{extends file='admin.tpl'}
{block name=main}
<div class="page-header">
	<h1>編輯</h1>
</div>
<ol class="breadcrumb">
	<li><a href="{$smarty.const.TOP}/admin/index.php?token={$token}">管理後台</a></li>
	<li><a href="{$smarty.const.TOP}/admin/people.php?token={$token}">與會者</a></li>
	<li class="active">編輯</li>
</ol>
{* person part *}
<div class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-3">
			<input data-method="POST" data-action="{$smarty.const.TOP}/api/person_field.php?token={$token}&person_id={$person.id}&method=patch"
 type="text" data-field="first_name" class="form-control" id="first-name-input" placeholder="First name" value="{$person.first_name|escape}">
		</div>
		<div class="col-sm-3">
			<input data-method="POST" data-action="{$smarty.const.TOP}/api/person_field.php?token={$token}&person_id={$person.id}&method=patch"
 type="text" data-field="last_name" class="form-control" id="last-name-input" placeholder="Last name" value="{$person.last_name|escape}">
		</div>
	</div>
	<div class="form-group">
		<label for="email-input" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-3">
			<input data-method="POST" data-action="{$smarty.const.TOP}/api/person_field.php?token={$token}&person_id={$person.id}&method=patch"
 type="email" data-field="email" class="form-control" id="email-input" placeholder="Email" value="{$person.email|escape}">
		</div>
	</div>
	<div class="form-group">
		<label for="occupation-input" class="col-sm-2 control-label">機構</label>
		<div class="col-sm-3">
			<input data-method="POST" data-action="{$smarty.const.TOP}/api/person_field.php?token={$token}&person_id={$person.id}&method=patch"
 type="text" data-field="occupation" class="form-control" id="occupation-input" placeholder="Your working occupation" value="{$person.occupation|escape}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputResume" class="col-sm-2 control-label">職稱</label>
		<div class="col-sm-4">
			<input data-method="POST" data-action="{$smarty.const.TOP}/api/person_field.php?token={$token}&person_id={$person.id}&method=patch"
 type="text" data-field="resume" class="form-control" id="resume-input" value="{$person.resume|escape}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputRoom" class="col-sm-2 control-label">Room</label>
		<div class="col-sm-2">
			<input data-method="POST" data-action="{$smarty.const.TOP}/api/person_field.php?token={$token}&person_id={$person.id}&method=patch"
 type="text" data-field="room" class="form-control" id="room-input" value="{$person.room|escape}">
		</div>
	</div>
</div>
<hr>
<form enctype="multipart/form-data" action="person/img.php?token={$token}&person_id={$person.id}&method=patch" method="POST" class="form-horizontal">
	<div class="form-group">
		<div class="col-sm-2 col-sm-offset-2">
			<p class="form-control-static">
				{if $person.img}
					<img src="{$smarty.const.TOP}/uploads/{$person.img}" style="height: 75px;">
				{else}
					No file
				{/if}
			</p>
		</div>
		<div class="col-sm-4">
			<label for="img-input" class="control-label">Upload</label>
			<input name="file" id="img-input" type="file" class="form-control" />
		</div>
		<div class="col-sm-2">
			<button type="submit" class="btn btn-primary">上傳檔案</button>
		</div>
	</div>
</form>
{foreach $talks as $talk}
<section id="talk-{$talk.id}">
<hr>
<h2>{$talk.session} Session
{if $talk.session eq 'Parallel'} <small>{$sessions[$talk.session_id].title|escape} ({$sessions[$talk.session_id].abbreviation|escape})</small>{/if}
<div class="pull-right">
<form method="POST" action="{$smarty.const.TOP}/admin/person/talk.php?token={$token}&person_id={$person.id}&talk_id={$talk.id}&method=delete">
	<button class="btn btn-danger" onClick="return confirm('確定刪除？');">移除</button>
</form>
</div>
</h2>
<form action="person/talk.php?token={$token}&person_id={$person.id}&talk_id={$talk.id}&method=patch" method="POST" class="form-horizontal">
	<div class="form-group">
		<label for="title-input={$talk.id}" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="title-input-{$talk.id}" placeholder="Your speak title" value="{$talk.title|escape}" name="title">
		</div>
	</div>
	<div class="form-group">
		<label for="abstract-input-{$talk.id}" class="col-sm-2 control-label">Abstract <small>(less than 300 words)</small></label>
		<div class="col-sm-10">
			<textarea id="abstract-input-{$talk.id}" class="form-control" rows="10" name="abstract">{$talk.abstract|escape}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="address-datetime-input-{$talk.id}" class="col-sm-2 control-label">Address Time</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" 
				id="address-datetime-input-{$talk.id}" placeholder="2015-06-02 14:00:00" value="{$talk.address_datetime|escape}" name="address_datetime">
		</div>
	</div>
	<div class="form-group">
		<label for="location" class="col-sm-2 control-label">Location</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="location" placeholder="NTU" value="{$talk.location|escape}" name="location">
		</div>
	</div>
	<div class="form-group">
		<label for="inputTalkTime" class="col-sm-2 control-label">Talk Time</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="inputTalkTime" placeholder="30 minutes" value="{$talk.talk_time|escape}" name="talk_time">
		</div>
	</div>
	<div class="form-group">
		<label for="session-input-{$talk.id}" class="col-sm-2 control-label">Session</label>
		<div class="col-sm-3">
			<select class="form-control" name="session" id="session-input-{$talk.id}">
				<option value="Normal" {if $talk.session eq 'Normal'}selected{/if}>Attendee</option>
				<option value="Plenary" {if $talk.session eq 'Plenary'}selected{/if}>Plenary Session Speaker</option>
				<option value="Parallel" {if $talk.session eq 'Parallel'}selected{/if}>Parallel Session Speaker</option>
				<option value="Poster" {if $talk.session eq 'Poster'}selected{/if}>Poster</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="session-id-input-{$talk.id}" class="col-sm-2 control-label">Session Code</label>
		<div class="col-sm-3">
			<select id="session-id-input-{$talk.id}" name="session_id" class="form-control">{strip}
				<option value="0" {if $talk.session_id eq '0'}selected{/if}></option>
				{foreach $sessions as $session}
				<option value="{$session.id}" {if $talk.session_id eq $session.id}selected{/if}>{$session.title}</option>
				{/foreach}
			{/strip}</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">更新</button>
		</div>
	</div>
</form>
<form enctype="multipart/form-data" action="person/talk/slide.php?token={$token}&person_id={$person.id}&talk_id={$talk.id}&method=patch" method="POST" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label">Slide</label>
		<div class="col-sm-4">
			<p class="form-control-static">
				{if $talk.slide_file}
					<a href="{$smarty.const.TOP}/uploads/{$talk.slide_file}" target="_blank">{$talk.slide_file}</a>
				{else}
					No file
				{/if}
			</p>
		</div>
	</div>
	<div class="form-group">
		<label for="slide-file-input-{$talk.id}" class="col-sm-2 control-label">Upload</label>
		<div class="col-sm-4">
			<input name="file" id="slide-file-input-{$talk.id}" type="file" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">上傳檔案</button>
		</div>
	</div>
</form>
</section>
{/foreach}
{/block}
{block name=body_script}
<script src="{$smarty.const.TOP}/js/admin/edit.js"></script>
<script src="{$smarty.const.TOP}/js/admin/person.edit.js"></script>
{/block}
