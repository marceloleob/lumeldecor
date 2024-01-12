(function($) {
	'use strict';

	/*===================================*
	BOOTSTRAP SELECTPICKER
	*===================================*/
	$( document ).ready(function() {
		$('.selectpicker').selectpicker({
			maxOptionsText: 'Limite atingido',
			size: 7
		});
	});

	/*===================================*
	Mostra a mensagem de retorno por 5 segundos
	*===================================*/
	$('.feedback').animate({
		opacity: 1
	}, 5000).fadeOut('slow');

	/*===================================*
	Fecha a mensagem caso seja clicada
	*===================================*/
	$('.feedback .close').click(function (e) {
		e.preventDefault();
		$(this).parent().parent().fadeOut('slow');
		return false;
	});

	/*===================================*
	ERROS NOS FORMS
	*===================================*/
	if ($('.help-block').length)
	{
		var $group = $('.help-block').parent();
		// remove o erro caso seja atualizado
		$('input', $group).keyup(function() {
			$(this).removeClass('is-invalid').addClass('is-valid');
			$('.help-block', $(this)).remove();
		});
		// adiciona o erro no input correspondente
		$('input', $group).addClass('is-invalid');
	}

})(jQuery);
