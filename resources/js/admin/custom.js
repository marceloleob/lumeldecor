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
	$('.selectpicker').selectpicker({
		noneSelectedText: 'Selecione',
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
     * Habilita o menu
     */
	$("#metismenu").metisMenu();

	/**
	 * Abre e fecha o menu clicando no Hamburger
	 *
	 */
	$(".close-sidebar-btn").click( function () {
		// classe para fechar o menu
		var toggle = $(this).attr("data-class");
		// adiciona ou remove do menu
		$(".app-container").toggleClass(toggle);
	});
	var forEach = function (t, o, r) {
		if ("[object Object]" === Object.prototype.toString.call(t))
			for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
		else
			for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t);
	};
	// recupera todos os Hamburgers
	var hamburgers = document.querySelectorAll(".hamburger");
	// verifica se encontrou
	if (hamburgers.length > 0) {
		// altera o formato dele
		forEach(hamburgers, function (hamburger) {
			hamburger.addEventListener("click", function () {
				this.classList.toggle("is-active");
			}, false);
		});
	}
});
