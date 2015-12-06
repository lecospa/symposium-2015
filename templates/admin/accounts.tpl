{extends file='admin.tpl'}

{block name=main}
<div class="page-header">
	<h1>管理後台 - 帳號</h1>
</div>

<ol class="breadcrumb">
	<li><a href="{$smarty.const.TOP}/admin/index.php">管理後台</a></li>
	<li class="active">帳號</li>
</ol>

<div class="table-responsive">
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th style="width: 100px;">id</th>
			<th style="width: 200px;">帳號</th>
			<th style="width: 200px;">密碼</th>
			<th>權限</th>
		</tr>
	</thead>
	<tbody>
		{foreach $accounts as $account}
		<tr>
			<th>{$account.id}</th>
			<td>{$account.user|escape}</td>
			<td></td>
			<td>
			{foreach $account.scopes as $scope}<code>{$scope.scope|escape}</code> {/foreach}
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>
</div>
{/block}
