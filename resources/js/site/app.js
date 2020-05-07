require('../bootstrap');



$(document).ready(function ()
{
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

    // validacao do formulario de contato
	if ($('#form-contact').length) {
		// validation
		$('#form-contact').validate({
			rules: {
				firstname: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
				lastname: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
				email: {
					required: true,
					minlength: 3,
					maxlength: 100,
					email: true,
				},
				phone: {
					required: true,
					minlength: 14,
					maxlength: 15,
				},
				subject: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
				text: {
					required: true,
					minlength: 5,
					maxlength: 2000,
				}
			}
		});
	}

});
