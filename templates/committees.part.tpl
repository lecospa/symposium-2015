{strip}
<div class="col-md-3">
	<div class="thumbnail" style="height: 220px;">
		<img src="{$smarty.const.TOP}/uploads/{$person.img}" class="img-responsive img-circle" style="height: 150px;">
		<h4>{$person.first_name|escape} {$person.last_name|escape}{if isset($chair)} <span class="label label-primary">Chair</span>{/if}</h4>
		<small>{$person.email|escape}</small>
	</div>
</div>
{/strip}
