$(document).ready(function ()
{
	/**
	 * Validacao do formulario
	 *
	 * https://jqueryvalidation.org/documentation/
	 */
	if ($('#form-product').length) {
		// validation
		$('#form-product').validate({
			rules: {
				// informacoes basicas
				material_id: {
					required: true,
				},
				category_id: {
					required: true,
				},
				name: {
					required: true,
					minlength: 2,
					maxlength: 300,
				},
				featured: {
					required: false,
				},
				description: {
					required: true,
					minlength: 5,
					maxlength: 2000,
				},
			}
		});
	}
});
