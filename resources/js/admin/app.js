require('../bootstrap');

// Selectpicker
require('../../../node_modules/bootstrap-select/dist/js/bootstrap-select');
require('../../../node_modules/jquery-validation/dist/jquery.validate.min.js');

$(document).ready(function ()
{
    /**
     * Posta o token do form toda fez que for ativado um post por ajax
     */
    $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
        return jqXHR.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
	});

	/**
	 * Desloga do sistema
	 */
	$('.logout').click(function (e) {
	    e.preventDefault();
	    document.getElementById('form-logout').submit();
    });

    /**
     * Habilita a opcao de tooltips
     */
    $('[data-toggle="tooltip"]').tooltip();

    /**
     * To style all selects
     */
    $('select').selectpicker({
		size: 7
	});

    /**
     * Mostra a mensagem de retorno por 4 segundos
     */
    $('.feedback').animate({
        opacity: 1
    }, 5000).fadeOut('slow');

    /**
     * Fecha a mensagem caso seja clicada
     */
    $('.feedback .close').click(function (e) {
        e.preventDefault();
        $(this).parent().parent().fadeOut('slow');
        return false;
	});
});
