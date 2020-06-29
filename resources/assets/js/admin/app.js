// Bootstrap
require('../bootstrap');

// Bootstrap SelectPicker
require('../../../../node_modules/bootstrap-select/dist/js/bootstrap-select');
// jQuery Validate
require('../../../../node_modules/jquery-validation/dist/jquery.validate.min.js');
// jQuery Masks
require('../../../../node_modules/jquery.maskedinput/src/jquery.maskedinput.js');
// Bootstrap DatePicker
require('../../../../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
// jQuery MaskMoney
require('../../../../node_modules/jquery-maskmoney/dist/jquery.maskMoney.min.js');

// MetisMenu
require('../../../../node_modules/metismenu/dist/metismenu');

(function($) {
	'use strict';

	/*===================================*
	EFETUA O LOGOUT DO SISTEMA
	/*===================================*/
	$( document ).ready(function() {
		$('.logout').click(function (event) {
			// Method cancels the event if it is cancelable
			event.preventDefault();
			// executa o logout
			document.getElementById('form-logout').submit();
		});
	});

	/*===================================*
	MENU
	*===================================*/
	$( document ).ready(function() {
		$("#metismenu").metisMenu();
	});

	/*===================================*
	TOOLTIPS OPTIONS
	*===================================*/
	$( document ).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});

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
	BOOTSTRAP DATEPICKER
	*===================================*/
	$( document ).ready(function() {
		$('.datepicker').datepicker({
			// locale: 'pt-br',
			format: "dd/mm/yyyy",
			autoclose: true,
			todayHighlight: true,
			startDate: (new Date().toLocaleString())
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

	/*===================================*
	Abre e fecha o menu clicando no "Hamburger"
	*===================================*/
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

})(jQuery);
