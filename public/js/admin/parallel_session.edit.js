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
	bind_patch("#date-time-1-input");
	bind_patch("#location-1-input");
	bind_patch("#date-time-2-input");
	bind_patch("#location-2-input");
	bind_patch(".session-ordering-input");
});
