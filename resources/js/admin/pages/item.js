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
				colors: {
					required: true,
				},
				supplier_id: {
					required: true,
				},
				s_price: {
					required: true,
				},
				p_price: {
					required: true,
				},
				themes: {
					required: true,
				},
				launch: {
					required: false,
				},
			}
		});
	}

	/**
	 * Configuracao do campo para Hashtags
	 *
	 */
	// $('.hashtag').tagsinput({
	// 	itemText: 'label',
	// 	confirmKeys: [13, 44, 32], // Enter, Coma, Space
	// 	trimValue: true
	// });
});
