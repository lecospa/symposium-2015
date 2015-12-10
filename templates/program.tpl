{extends file='others.tpl'}
{block name=head append}
<link href="{$smarty.const.TOP}/css/program.css" rel="stylesheet">
{/block}
{block name=main}
<div class="page-header">
	<h1>Conference Program</h1>
</div>
<div style="overflow-y: auto;">
<table class="table table-bordered" id="timetable">
	<thead>
	<tr style="height: 45px;">
		<th></th>
		<th>12/13/2015 (Sun.)</th>
		<th>12/14/2015 (Mon.)</th>
		<th>12/15/2015 (Tue.)</th>
		<th>12/16/2015 (Wed.)</th>
		<th>12/17/2015 (Thur.)</th>
		<th>12/18/2015 (Fri.)</th>
	</tr>
	</thead>
	<tbody>
	<tr style="height: 60px;">
		<th>8:00-9:00</th>
		<td rowspan="17" style="background-color: #cccccc;"></td>
		<td colspan="5" style="background-color: yellow;">Registration</td>
	</tr>
	<tr style="height: 10px;">
		<th style="background-color: #cccccc;"></th>
		<td style="background-color: #d9ead3;">Chair: {include file='program_person.part' person=$people[91]}</td>
		<td style="background-color: #d9ead3;">Chair: {include file='program_person.part' person=$people[155]}</td>
		<td style="background-color: #d9ead3;">Chair: Bum-Hoon Lee</td>
		<td style="background-color: #d9ead3;">Chair: {include file='program_person.part' person=$people[74]}</td>
		<td style="background-color: #d9ead3;">Chair: Wei-Shu Hou</td>
	</tr>
	<tr style="height: 35px;">
		<th>9:00-9:35</th>
		<td>{include file='program_person.part' person=$people[7]}</td>
		<td>{include file='program_person.part' person=$people[159]}</td>
		<td>{include file='program_person.part' person=$people[158]}</td>
		<td>{include file='program_person.part' person=$people[155]}</td>
		<td>{include file='program_person.part' person=$people[157]}</td>
	</tr>
	<tr style="height: 35px;">
		<th>9:35-10:10</th>
		<td>{include file='program_person.part' person=$people[150]}</td>
		<td>{include file='program_person.part' person=$people[129]}</td>
		<td style="background-color: #cfe2f3;" rowspan="20">9:35-17:00<br>Excursion<br>Taipei-Yilan Tour</td>		
		<td>{include file='program_person.part' person=$people[255]}</td>
		<td>{include file='program_person.part' person=$people[122]}</td>
	</tr>
	<tr style="height: 35px;">
		<th>10:10-10:45</th>
		<td>{include file='program_person.part' person=$people[118]}</td>
		<td>{include file='program_person.part' person=$people[91]}</td>
		<td>{include file='program_person.part' person=$people[353]}</td>
		<td>{include file='program_person.part' person=$people[126]}</td>
	</tr>
	<tr style="height: 30px;">
		<th>10:45-11:15</th>
		<td style="background-color: #cfe2f3;">Conference Photo &amp;<br>Coffee Break</td>
		<td style="background-color: #cfe2f3;">Coffee Break</td>
		<td style="background-color: #cfe2f3;">Conference Photo &amp;<br>Coffee Break</td>
		<td style="background-color: #cfe2f3;">Coffee Break</td>
	</tr>
	<tr style="height: 10px;">
		<th style="background-color: #cccccc;"></th>
		<td	style="background-color: #d9ead3;">Chair: Ronald Taam</td>
		<td style="background-color: #d9ead3;">Chair: {include file='program_person.part' person=$people[163]}</td>
		<td style="background-color: #d9ead3;">Chair: {include file='program_person.part' person=$people[73]}</td>
		<td style="background-color: #d9ead3;">Chair: {include file='program_person.part' person=$people[159]}</td>
	</tr>
	<tr style="height: 35px;">
		<th>11:15-11:50</th>
		<td>{include file='program_person.part' person=$people[178]}</td>
		<td>{include file='program_person.part' person=$people[191]}</td>
		<td>{include file='program_person.part' person=$people[154]}</td>
		<td>{include file='program_person.part' person=$people[166]}</td>
	</tr>
	<tr style="height: 35px;">
		<th>11:50-12:25</th>
		<td>{include file='program_person.part' person=$people[146]}</td>
		<td>{include file='program_person.part' person=$people[120]}</td>
		<td>{include file='program_person.part' person=$people[177]}</td>
		<td>{include file='program_person.part' person=$people[163]}</td>
	</tr>
	<tr style="height: 65px;">
		<th>12:25-13:30</th>
		<td colspan="2" style="background-color: #cfe2f3;">Lunch</td>
		<td colspan="2" style="background-color: #cfe2f3;">Lunch</td>
	</tr>
	<tr style="height: 20px;">
		<th rowspan="6">13:30-15:30</th>
		<td rowspan="6">Parallel Sessions:<br>{include file='program_session.part' session=$session[5]} {include file='program_session.part' session=$session[6]} {include file='program_session.part' session=$session[3]} {include file='program_session.part' session=$session[11]}</td>
		<td rowspan="6">Parallel Sessions:<br>{include file='program_session.part' session=$session[4] suffix='I'} {include file='program_session.part' session=$session[10] suffix="II"} {include file='program_session.part' session=$session[8]} {include file='program_session.part' session=$session[2]}</td>
		<td rowspan="9">13:30-17:00<br>Parallel Sessions:<br>{include file='program_session.part' session=$session[9] suffix='II'} {include file='program_session.part' session=$session[7]} {include file='program_session.part' session=$session[4] suffix='II'} {include file='program_session.part' session=$session[1]}</td>
		<td>{include file='program_session.part' session=$session[1]}(13:30-13:50)</td>
	</tr>
	<tr style="height: 20px;">
		<td>{include file='program_session.part' session=$session[2]}(13:50-14:02)</td>
	</tr>
	<tr style="height: 20px;">
		<td>{include file='program_session.part' session=$session[9]}(14:02-14:30)</td>
	</tr>
	<tr style="height: 20px;">
		<td>{include file='program_session.part' session=$session[3]}(14:30-14:50)</td>
	</tr>
	<tr style="height: 40px;">
		<td>{include file='program_session.part' session=$session[4]}(14:50-15:30)</td>
	</tr>
	<tr>
	</tr>
	<tr style="height: 30px;">
		<th>15:30-16:00</th>
		<td style="background-color: #cfe2f3;">Coffee Break</td>
		<td style="background-color: #cfe2f3;">Coffee Break</td>
		<td style="background-color: #cfe2f3;">Coffee Break</td>
	</tr>
	<tr style="height: 20px;">
		<th rowspan="6">16:00-17:30</th>
		<td rowspan="7" style="background-color: yellow;">Registration</td>
		<td rowspan="6">Parallel Sessions:<br>{include file='program_session.part' session=$session[10] suffix='I'} {include file='program_session.part' session=$session[6]} {include file='program_session.part' session=$session[3]} {include file='program_session.part' session=$session[11]}</td>
		<td rowspan="6">
			Parallel Sessions:<br>
			{include file='program_session.part' session=$session[9] suffix='I'}
			{include file='program_session.part' session=$session[4] suffix='I'}
			{include file='program_session.part' session=$session[10] suffix='II'}
			{include file='program_session.part' session=$session[8]}
		</td>
		<td>{include file='program_session.part' session=$session[7]}(16:00-16:20)</td>
	</tr>
	<tr style="height: 10px;">
		<td rowspan="2">{include file='program_session.part' session=$session[8]}(16:20-16:40)</td>
	</tr>
	<tr style="height: 10px;">
		<td rowspan="5" style="background-color: #cfe2f3;">17:00-18:00<br>Coffee Hour<br>Xmas Celebration</td>
	</tr>
	<tr style="height: 20px;">
		<td>{include file='program_session.part' session=$session[5]}(16:40-16:52)</td>
	</tr>
	<tr style="height: 20px;">
		<td>{include file='program_session.part' session=$session[10]}(16:52-17:20)</td>
	</tr>
	<tr style="height: 20px;">
		<td>{include file='program_session.part' session=$session[6]}(17:20-17:40)</td>
	</tr>
	<tr style="height: 20px;">
		<th rowspan="3">17:40-18:15</th>
		<td style="background-color: #d9ead3;" rowspan="1">Chair: {include file='program_person.part' person=$people[166]}</td>
		<td style="background-color: #d9ead3;" rowspan="1">Chair: {include file='program_person.part' person=$people[158]}</td>
		<td style="background-color: #cfe2f3;" rowspan="5"><a href="social_events/symposium_banquet.php">17:40-21:00<br>Banquet at Formosa Pearl<br>(Yilan)</a></td>
		<td rowspan="1">{include file='program_session.part' session=$session[11]}(17:40-18:00)</td>
	</tr>
	<tr style="height: 15px;">
		<td rowspan="4"></td>
		<td rowspan="2">{include file='program_person.part' person=$people[119]}</td>
		<td rowspan="2">{include file='program_person.part' person=$people[57]}</td>
		<td style="background-color: #d9ead3;">Chair: Juin-Huei Proty Wu</td>
		<td style="background-color: #cccccc;"></td>
	</tr>
	<tr>
		<td>18:00-18:35<br>{include file='program_person.part' person=$people[291]}</td>
		<td>18:00-18:15<br>Closing remarks:<br>{include file='program_person.part' person=$people[91]}</td>
	</tr>
	<tr style="height: 75px;">
		<th rowspan="2">18:15-</th>
		<td><a href="social_events/welcome_reception.php">18:30-19:30<br>Welcome Reception</a></td>
		<td rowspan="2">Free Night</td>
		<td rowspan="2">Free Night</td>
		<td rowspan="2">Goodbye!</td>
	</tr>
	<tr style="height: 60px;">
		<td><a href="social_events/opening_night_concert.php">19:30-20:30<br>Opening Night Concert</a></td>
	</tr>
	</tbody>
</table>
</div>
{/block}
