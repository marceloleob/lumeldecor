$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-category').length) {
		// validation
		$('#form-category').validate({
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
