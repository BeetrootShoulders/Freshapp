'use strict';

(function ($) {

	var o = $({});

	$.subscribe = function () {
		o.on.apply(o, arguments);
	};

	$.unsubscribe = function () {
		o.off.apply(o, arguments);
	};

	$.publish = function () {
		o.trigger.apply(o, arguments);
	};
})(jQuery);
(function () {

	var submitAjaxRequest = function submitAjaxRequest(e) {
		var form = $(this);
		var method = form.find('input[name="_method"]').val() || 'POST'; // find the hidden method field that laravel adds, otherwise default to POST
		console.log(method);
		$.ajax({
			type: method,
			url: form.prop('action'),
			data: form.serialize,
			success: function success() {
				$.publish('form.submitted', form);
			}
		});

		e.preventDefault();
	};

	//forms marked with data-remote will submit via Ajax
	$('form[data-remote]').on('submit', submitAjaxRequest);
})();
(function () {

	$.subscribe('form.submitted', function () {
		$('.flash').fadeIn(500).delay(1000).fadeOut(500);
	});
})();
//# sourceMappingURL=all.js.map