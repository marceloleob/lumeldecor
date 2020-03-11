$(function () {
	/**
	 * Habilita a opcao de tooltips
	 */
	$('[data-toggle="tooltip"]').tooltip()

	/**
	 * Posta o token do form toda fez que for ativado um post por ajax
	 */
	$.ajaxPrefilter(function (options, originalOptions, jqXHR) {
		return jqXHR.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
	});

    /**
     * Bootstrap selectpiker
     */
    $('select').selectpicker();

	/**
	 * Mostra a mensagem de retorno por 4 segundos
	 */
	$('.alert').animate({
		opacity: 1.0
	}, 5000).fadeOut('slow');

	/**
	 * Mostra a mensagem de retorno por 5 segundos
	 */
	$('#toast-container').animate({
		opacity: 1.0
	}, 5000).fadeOut('slow');

	/**
	 * Fecha a mensagem caso seja clicada
	 */
	$('.alert .close').click(function (e) {
		e.preventDefault();
		$(this).parent().parent().fadeOut('slow');
		return false;
	});

	/**
	 * Fecha a mensagem caso seja clicada
	 */
	$('.toast-close-button').click(function (e) {
		e.preventDefault();
		$(this).parent().parent().fadeOut('slow');
		return false;
	});

	/**
	 * Desloga do sistema
	 */
	$('.logout').click(function (e) {
		e.preventDefault();
		document.getElementById('form-logout').submit();
	});

	/**
	 * Binda o botao do grid para alterar o status de um registro
	 *
	 */
	if ($('#toggle-status').length) {
		// binda botao toggle-status
		$('button[id="toggle-status"]').click(function () {
			// executa o AJAX
			loadToggleStatus($(this));
		});
	}

    /**
     * Funcao que altera o STATUS de qualquer GRID
     *
	 * @param element element
     */
	function loadToggleStatus(element)
	{
		var code = element.data('id');
		var model = element.data('model');

		$.ajax({
			url: '/ajax/toggle-status',
			type: 'POST',
			dataType: 'json',
			data: {
				code: code,
				model: model,
			},
			success: function (response)
			{
				// mostra a mensagem
				showToast(response);
				// verifica se foi sucesso
				if (response.type == 'success') {
					// Altera o icone da lixeira
					element.toggleClass('btn-outline-danger btn-outline-success');
					element.find('i').toggleClass('fa-trash-alt fa-check');
					// Altera o status no grid
					$('.div-' + code).toggleClass('badge-success badge-danger');
					document.getElementById('div-' + code).innerHTML = (response.current == true) ? 'Ativo' : 'Inativo';
				}
			}
		});
	}

	function showToast(response)
	{
		console.log(response);
		// verifica se foi sucesso
		if (response.type == 'error') {
			document.getElementById('toast-message').innerHTML = response.error;
			$('#toast-container').show();
		}
	}
});
