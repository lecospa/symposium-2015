function status_label() {
	return $("<span class=\"label label-success\" aria-hidden=\"true\" style=\"position: absolute\">儲存...</span>");
}
function bind_patch(selector) {
	$(selector).change(function() {
		var me = $(this), state = status_label().insertBefore(me);
		var data = {}; data[me.data("field")] = me.val();
		$.ajax({
			type: me.data("method"), url: me.data("action"), data: data
		}).done(function(res) {
			state.fadeOut(2000, function(){$(this).remove()});
		});
	});
}
