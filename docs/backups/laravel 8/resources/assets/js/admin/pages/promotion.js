$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-promotion').length) {
		// validation
		$('#form-promotion').validate({
			rules: {

				material_id: {
					required: true,
				},
				category_id: {
					required: true,
				},
				name: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
			}
		});
	}
});
