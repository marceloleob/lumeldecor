$(document).ready(function ()
{
    // validacao do formulario de busca
	if ($('#form-search').length) {
		// validation
		$('#form-search').validate({
			rules: {
				teste: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
			}
		});
	}

	$('#btn-search').click(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();

		alert('tem certeza?');
	});

});
