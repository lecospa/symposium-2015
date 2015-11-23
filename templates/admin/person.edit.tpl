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
<form action="person.php?token={$token}&id={$id}&method=patch" method="POST" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="inputFirstName" placeholder="First name" value="{$person.first_name|escape}" name="first_name">
		</div>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="inputLastName" placeholder="Last name" value="{$person.last_name|escape}" name="last_name">
		</div>
	</div>
	<div class="form-group">
		<label for="input_email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="input_email" placeholder="Email" value="{$person.email|escape}" name="email">
		</div>
	</div>
	<div class="form-group">
		<label for="inputOccupation" class="col-sm-2 control-label">機構</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputOccupation" placeholder="Your working occupation" value="{$person.occupation|escape}" name="occupation">
		</div>
	</div>
	<div class="form-group">
		<label for="inputResume" class="col-sm-2 control-label">職稱</label>
		<div class="col-sm-10">
			<textarea id="inputResume" class="form-control" rows="2" name="resume">{$person.resume|escape}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="inputRoom" class="col-sm-2 control-label">Room</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputRoom" value="{$person.room|escape}" name="room">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">更新</button>
		</div>
	</div>
</form>
{for $talks as $talk}
{talk.session} - {talk.session_id}
<form action="person/talk.php?token={$token}&person_id={$person_id}&talk_id={$talk_id}" method="POST" class="form-horizontal">
	<div class="form-group">
		<label for="inputTitle" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" placeholder="Your speak title" value="{$talk.title|escape}" name="title">
		</div>
	</div>
	<div class="form-group">
		<label for="inputAbstract" class="col-sm-2 control-label">Abstract <small>(less than 300 words)</small></label>
		<div class="col-sm-10">
			<textarea id="inputAbstract" class="form-control" rows="10" name="abstract">{$talk.abstract|escape|nl2br}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="inputAddressDateTime" class="col-sm-2 control-label">Address Time</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputAddressDateTime" placeholder="2015-06-02 14:00:00" value="{$talk.address_datetime|escape}" name="address_datetime">
		</div>
	</div>

	<div class="form-group">
		<label for="inputTalkTime" class="col-sm-2 control-label">Talk Time</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTalkTime" placeholder="30 minutes" value="{$talk.talk_time|escape}" name="talk_time">
		</div>
	</div>
	<div class="form-group">
		<label for="inputType" class="col-sm-2 control-label">Session</label>
		<div class="col-sm-10">
			<select class="form-control" name="session" id="inputType">
				<option value="Normal" {if $talk.session eq 'Normal'}selected{/if}>Attendee</option>
				<option value="Plenary" {if $talk.session eq 'Plenary'}selected{/if}>Plenary Session Speaker</option>
				<option value="Parallel" {if $talk.session eq 'Parallel'}selected{/if}>Parallel Session Speaker</option>
				<option value="Poster" {if $talk.session eq 'Poster'}selected{/if}>Poster</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="inputSessionCode" class="col-sm-2 control-label">Session Code</label>
		<div class="col-sm-6">
			<select id="inputSessionCode" name="inputsessioncode" class="form-control">
				<option value="0" {if $talk.session_id eq '0'}selected{/if}></option>
				{foreach $sessions as $session}
				<option value="{$session.id}" {if $talk.session_id eq $session.id}selected{/if}>{$session.title}</option>
				{/foreach}
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">更新</button>
		</div>
	</div>
</form>
{/foreach}
{*<div class="row">
	<div class="col-md-6">
		<p class="form-control-static">
			{if $person['slide_file']}
				<a href="{$smarty.const.TOP}/uploads/{$person['slide_file']}" target="_blank">{$person['slide_file']}</a>
			{else}
				No
			{/if}
		</p>
	</div>
	<div class="col-md-6">
		<p class="form-control-static">
			{if $person['img']}
				<img class="img-responsive img-thumbnail" style="width: 150px;" src="{$smarty.const.TOP}/uploads/{$person['img']}" />
			{else}
				No
			{/if}
		</p>
	</div>
</div>*}
{/block}
