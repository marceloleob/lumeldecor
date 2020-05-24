$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-campaign').length) {
		// validation
		$('#form-campaign').validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
				start_day: {
					required: true,
				},
				start_month: {
					required: true,
				},
				finish_day: {
					required: true,
				},
				finish_month: {
					required: true,
				},
			}
		});
	}
});
