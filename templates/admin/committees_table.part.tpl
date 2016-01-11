{foreach $people as $person}
<tr>
	<td>{$person.first_name|escape} {$person.last_name|escape}</td>
	<td><img class="img-responsive" src="{$smarty.const.TOP}/uploads/{$person.img}" style="max-height: 50px;"></td>
	<td>{$person.email|escape}</td>
	<td><a class="btn btn-default" href="{$smarty.const.TOP}/admin/person.php?id={$person.id}&mode=edit">編輯</a></td>
	<td>
		<form method="POST" action="{$smarty.const.TOP}/admin/committee.php?method=delete&committee_id={$committee_id}&person_id={$person.id}">
			<button class="btn btn-danger" onClick="return confirm('確定刪除？');">移除</button>
		</form>
	</td>
</tr>
{/foreach}
