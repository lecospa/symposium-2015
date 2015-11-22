{literal}
$(".session-ordering-input").change(function(){
	var me = $(this), state = $("<span class=\"label label-success pull-right\">儲存...</span>").insertBefore(me);
	$.ajax({
		type: me.data("method"), url: me.data("action"), data: {'session_ordering': me.val()}
	}).done(function(res) {
		state.fadeOut(function(){$(this).remove();});
	});
});
$(".organizer-delete-button").click(function(){
	if (!confirm('確定刪除？')) {
		return false;
	}
	var me = $(this).attr('disabled', true),
		state = $("<span class=\"glyphicon glyphicon-refresh glyphicon-refresh-animate organizer-delete-status\"> ").prependTo(me),
		container = me.parent().parent(); 
	$.ajax({
		type: me.data("method"), url: me.data("action")
	}).done(function(res) {
		container.fadeOut(function(){$(this).remove();});
	});
});
$("#title_input").change(function() {
	var me = $(this), state = $("#title_patch_status").show();
	$.ajax({
		type: me.data("method"), url: me.data("action"), data: {'title': me.val()}
	}).done(function(res) {
		state.fadeOut(3000);
	});
});
$("#abbreviation_input").change(function() {
	var me = $(this), state = $("#abbreviation_patch_status").show();
	$.ajax({
		type: me.data("method"), url: me.data("action"), data: {'abbreviation': me.val()}
	}).done(function(res) {
		state.fadeOut(3000);
	});
});
$("#location_input").change(function() {
	var me = $(this), state = $("#location_patch_status").show();
	$.ajax({
		type: me.data("method"), url: me.data("action"), data: {'location': me.val()}
	}).done(function(res) {
		state.fadeOut(3000);
	});
});
{/literal}
