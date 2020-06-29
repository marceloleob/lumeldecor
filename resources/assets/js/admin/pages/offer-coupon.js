$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-coupon').length) {
		// validation
		$('#form-coupon').validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 150,
				},
				code: {
					required: true,
					minlength: 5,
					maxlength: 15,
				},
				kind: {
					required: true,
				},
				amount: {
					required: true,
				},
				start_date: {
					required: true,
				},
				finish_date: {
					required: true,
				},
			}
		});
	}

	/**
	 * Seta o tipo do valor
	 */
	$('select[name="kind"]').change(function() {
		// verifica o tipo selecionado
		if ($(this).val() == 'V') {
			$('.append-kind').text('');
			$('.prepend-kind').text('R$');
		} else if ($(this).val() == 'P') {
			$('.append-kind').text('%');
			$('.prepend-kind').text('');
		}
	});

	/**
	 * Ao carregar o form
	 */
	if ($('select[name="kind"]').val()) {
		if ($('').val() == 'V') {
			$('.append-kind').text('');
			$('.prepend-kind').text('R$');
		} else if ($('select[name="kind"]').val() == 'P') {
			$('.append-kind').text('%');
			$('.prepend-kind').text('');
		}
	}
});
