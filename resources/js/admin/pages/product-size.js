$(document).ready(function ()
{
	/**
	 * Validacao do formulario
	 *
	 * https://jqueryvalidation.org/documentation/
	 */
	if ($('#form-product-size').length) {
		// validation
		$('#form-product-size').validate({
			rules: {
				size: {
					required: true,
				},
				weight: {
					required: true,
				},
				shape: {
					required: true,
				},
				pro_length: {
					required: false,
				},
				pro_width: {
					required: false,
				},
				pro_height: {
					required: true,
				},
				shi_length: {
					required: false,
				},
				shi_width: {
					required: false,
				},
				shi_height: {
					required: true,
				},
			}
		});
	}

	/**
	 * Altera a opcao de "Comprimento" para "Diametro" caso selecione a forma do produto "Redondo"
	 *
	 */
	$('.shape').change(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();

		var widthDiv    = $(this).closest('.row-dimension').find('.div-width');
		var lengthDiv   = $(this).closest('.row-dimension').find('.div-length');
		var lengthlabel = lengthDiv.find('label');

		if ($(this).val() === 'R') {
			// esconde o campo de largura e altera o label do comprimento
			widthDiv.addClass('hide');
			lengthlabel.html('Diâmetro');

		} else if ($(this).val() === 'Q') {
			// mostra o campo de largura e altera o label do diametro
			widthDiv.removeClass('hide');
			lengthlabel.html('Comprimento');
		}
	});

	/**
	 * Duplica a informacao dos campos de "Comprimento"
	 *
	 */
	$('#pro_length').keyup(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();

		$('#shi_length').val($(this).val());
	});

	/**
	 * Duplica a informacao dos campos de "Comprimento"
	 *
	 */
	$('#pro_width').keyup(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();

		$('#shi_width').val($(this).val());
	});

	/**
	 * Duplica a informacao dos campos de "Comprimento"
	 *
	 */
	$('#pro_height').keyup(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();

		$('#shi_height').val($(this).val());
	});
});
