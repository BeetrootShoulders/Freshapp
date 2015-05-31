(function(){

	var submitAjaxRequest = function(e) {
		var form = $(this);
		var method = form.find('input[name="_method"]').val() || 'POST'; // find the hidden method field that laravel adds, otherwise default to POST
		console.log(method);
		$.ajax({
			type: method,
			url: form.prop('action'),
			data: form.serialize,
			success: function(){
				$.publish('form.submitted', form);
			}
		});

		e.preventDefault();
	};

	//forms marked with data-remote will submit via Ajax
	$('form[data-remote]').on('submit', submitAjaxRequest);

})();