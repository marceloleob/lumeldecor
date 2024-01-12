$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-theme').length) {
		// validation
		$('#form-theme').validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
				show: {
					required: true,
				},
			}
		});
	}
});
