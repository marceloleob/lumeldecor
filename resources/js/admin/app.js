require('../bootstrap');

$(document).ready(function ()
{
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
     * Posta o token do form toda fez que for ativado um post por ajax
     */
    $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
        return jqXHR.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
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

    $('.clear-search').click(function (e) {
        e.preventDefault();
        console.log('teste');
        $('input[name="search"]').val('');
        $('#form-search').submit();
        // document.getElementById('form-search').reset();
        //document.getElementById('form-search').submit();
    });
});

