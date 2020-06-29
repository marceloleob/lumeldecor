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
					required: true,
				},
				pro_width: {
					required: function () {
						return $('#shape-Q').is(':checked');
					},
				},
				pro_height: {
					required: true,
				},
				shi_length: {
					required: true,
				},
				shi_width: {
					required: true,
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

		var widthInput  = $(this).closest('.card-body').find('.input-width');
		var widthlabel  = $(this).closest('.card-body').find('.label-width');
		var lengthlabel = $(this).closest('.card-body').find('.label-length');

		if ($(this).val() === 'R') {
			// esconde o campo de largura e altera o label do comprimento
			widthInput.attr('disabled', true);
			widthlabel.addClass('line-through');
			lengthlabel.html('Diâmetro');

		} else if ($(this).val() === 'Q') {
			// mostra o campo de largura e altera o label do diametro
			widthInput.attr('disabled', false);
			widthlabel.removeClass('line-through');
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

	/**
	 * Da foco nos botoes de cores ao lado dos respectivos tamanhos
	 *
	 */
	$('.add-color').on('click', function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		$('html, body').animate({
			scrollTop: 1000
		}, 600);
		return false;
	});
});
