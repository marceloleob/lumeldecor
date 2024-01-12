$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-color').length) {
		// validation
		$('#form-color').validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
			}
		});
	}
});
