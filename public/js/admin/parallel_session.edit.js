$(function() {
	function status_label() {
		return $("<span class=\"label label-success\" aria-hidden=\"true\" style=\"position: absolute\">儲存...</span>");
	}
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
	function bind_patch(selector, key) {
		$(selector).change(function() {
			var me = $(this), state = status_label().insertBefore(me);
			var data = {}; data[key] = me.val();
			$.ajax({
				type: me.data("method"), url: me.data("action"), data: data
			}).done(function(res) {
				state.fadeOut(2000, function(){$(this).remove()});
			});
		});
	}
	bind_patch("#title-input", "title");
	bind_patch("#abbreviation-input", "abbreviation");
	bind_patch("#location-input", "location");
	bind_patch("#date-input", "date");
	bind_patch("#time-input", "time");
	bind_patch(".session-ordering-input", "session_ordering");
});
