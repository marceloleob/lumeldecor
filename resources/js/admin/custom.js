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
	 * Bootstrap SelectPicker
	 */
	$('.selectpicker').selectpicker({
		noneSelectedText: 'Selecione',
		size: 7
	});

	/**
	 * Bootstrap DatePicker
	 */
	$('.datepicker').datepicker({
		// locale: 'pt-br',
		format: "dd/mm/yyyy",
		// orientation: "bottom auto",
		autoclose: true,
		todayHighlight: true,
		startDate: (new Date().toLocaleString())
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
	 * Caso o backend retorne erro, este bloco faz o tratamento
	 *
	 * CORRIGIR ESTE BLOCO!
	 *
	 */
	if ($('.help-block').length) {

		// $('input').focus(function() {
		// 	$(this)
		// });

		// recupera o form-group do erro
		var $group = $('.help-block').parent();

		// remove o erro caso seja atualizado
		$('input', $group).keyup(function(){
			// console.log($(this));
			$(this).removeClass('is-invalid').addClass('is-valid');
			$('.help-block', $(this)).remove();
		});
		// adiciona o erro no input correspondente
		$('input', $group).addClass('is-invalid');
	}

    /**
     * Habilita o menu
     */
	$("#metismenu").metisMenu();


	// /**
	//  * Seta o status ao carregar a pagina
	//  *
	//  * https://www.bootstraptoggle.com
	//  */
	// if ($('.checkbox-status').is(':checked')) {
	// 	$('.label-status').append("<strong>ativo</strong>");
	// } else {
	// 	$('.label-status').append("<strong>inativo</strong>");
	// }

	// /**
	//  * Acao ao clicar no botao ativar ou desativar
	//  */
	// $('.checkbox-status').click(function() {
	// 	if ($('.checkbox-status').is(':checked')) {
	// 		$('.checkbox-status').attr('value', 'yes');
	// 		$('.label-status').text('Você ativou este registro');
	// 	} else {
	// 		$('.checkbox-status').attr('value', 'no');
	// 		$('.label-status').text('Você desativou este registro');
	// 	}
	// });

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
