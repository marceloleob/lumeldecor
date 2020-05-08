$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-product').length) {
		// validation
		$('#form-product').validate({
			rules: {
				supplier_id: {
					required: true,
				},
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

	/**
	 * Tratamento dos blocos no cadastro de produtos
	 */
	$('.check-card').click(function (e) {
		// recupera o elemento clicado
		let element = $(this).data('card');
		// verifica se checou ou nao
		if ($(this).is(':checked')) {
			// adiciona background
			$('.' + element).addClass('check-card');
		} else {
			// remove background
			$('.' + element).removeClass('check-card');
		}
	});
});
