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

	/**
	 * Altera o CSS da navegacao no cadastro de produto
	 */
	$('.nav-product').mouseenter(function ()
	{
		$(this).find('em').css('background', '#3f6ad8');
	})
	.mouseleave(function ()
	{
		if (!$(this).hasClass('active')) {
			$(this).find('em').css('background', '#adb5bd');
		}
	});
});
