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

	/**
	 * Tratamento dos blocos no cadastro de produtos
	 */
	$('.check-card').click(function (e) {
		// recupera o elemento clicado
		let element = $(this).data('card');
		// verifica se checou ou nao
		if ($(this).is(':checked')) {
			// adiciona background
			$('.' + element).addClass('check-card');
		} else {
			// remove background
			$('.' + element).removeClass('check-card');
		}
	})

    /**
     * forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
     *
     * @private
     * @author Todd Motto
     * @link https://github.com/toddmotto/foreach
     * @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
     * @callback requestCallback      callback   - Callback function for each iteration.
     * @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
     * @returns {}
     */
    var forEach = function (t, o, r) {
        if ("[object Object]" === Object.prototype.toString.call(t))
            for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
        else
            for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)
    };
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
        forEach(hamburgers, function (hamburger) {
            hamburger.addEventListener("click", function () {
                this.classList.toggle("is-active");
            }, false);
        });
    }
});
