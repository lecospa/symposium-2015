$(function() {
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
	bind_patch("#title-input");
	bind_patch("#abbreviation-input");
	bind_patch("#location-input");
	bind_patch("#date-input");
	bind_patch("#time-input");
	bind_patch(".session-ordering-input");
});
