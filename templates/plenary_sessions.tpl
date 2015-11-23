{extends file='others.tpl'}
{block name=main}
<div class="page-header">
	<h1>Plenary Session Speakers</h1>
</div>
<div class="alert alert-info" role="alert">You can click speaker’s photo to see his talk title and abstract.</div>
<div class="row">
	{foreach $plenary_sessions as $talk}
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="thumbnail" style="height: 250px; position: relative;">
				<a href="{$smarty.const.TOP}/plenary_session.php?talk_id={$talk.id}">
					<img src="{$smarty.const.TOP}/uploads/{$talk.person.img}" class="img-responsive img-circle" style="height: 150px;">
				</a>
				<h4>
					<a href="{$smarty.const.TOP}/plenary_session.php?talk_id={$talk.id}">
					{$talk.person.first_name|escape} {$talk.person.last_name|escape}</a></h4>
				<p>{$talk.person.occupation|escape}</p>
				<span style="position: absolute; bottom: 0; right: 5px;"><a href="{$smarty.const.TOP}/plenary_session.php?talk_id={$talk.id}">» more</a></span>
			</div>
		</div>
	{/foreach}
</div>
{/block}
