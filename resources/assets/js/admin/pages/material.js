$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-material').length) {
		// validation
		$('#form-material').validate({
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
