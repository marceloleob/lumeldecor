$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-promotion').length) {
		// validation
		$('#form-promotion').validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 150,
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
