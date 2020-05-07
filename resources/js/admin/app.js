require('../bootstrap');

// Selectpicker
require('../../../node_modules/bootstrap-select/dist/js/bootstrap-select');
require('../../../node_modules/jquery-validation/dist/jquery.validate.min.js');

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
     * To style all selects
     */
    $('select').selectpicker();

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

	/**
	 * -------------------------------------------------------------------------
	 * VALIDACOES DE FORMULARIOS
	 * -------------------------------------------------------------------------
	 */

	// Formulario de Categoria
	if ($('#form-category').length) {
		// validation
		$('#form-category').validate({
			rules: {
				material_id: {
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

	// Formulario de Material
	if ($('#form-material').length) {
		// validation
		$('#form-material').validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
			}
		});
    }
});
