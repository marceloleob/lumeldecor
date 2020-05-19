$(document).ready(function ()
{
	/**
	 * Validacao do formulario
	 *
	 */
	if ($('#form-item').length) {
		// validation
		$('#form-item').validate({
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
				description: {
					required: false,
					minlength: 5,
					maxlength: 3000,
				},
				hashtag: {
					required: false,
				},
			}
		});
	}

	/**
	 * Configuracao do campo para Hashtags
	 *
	 */
	$('.hashtag').tagsinput({
		itemText: 'label',
		confirmKeys: [13, 44, 32], // Enter, Coma, Space
		trimValue: true
	});
});
