// Bootstrap
import "../bootstrap";

// Bootstrap SelectPicker
import "../../../../node_modules/bootstrap-select/dist/js/bootstrap-select";
// jQuery Validate
import "../../../../node_modules/jquery-validation/dist/jquery.validate.min.js";
// jQuery Masks
import "../../../../node_modules/jquery.maskedinput/src/jquery.maskedinput.js";
// Bootstrap DatePicker
import "../../../../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js";
// jQuery MaskMoney
import "../../../../node_modules/jquery-maskmoney/dist/jquery.maskMoney.min.js";

// MetisMenu
import "../../../../node_modules/metismenu/dist/metismenu";

(function ($) {
    "use strict";

    /*===================================*
	EFETUA O LOGOUT DO SISTEMA
	/*===================================*/
    $(document).ready(function () {
        $(".logout").click(function (event) {
            // Method cancels the event if it is cancelable
            event.preventDefault();
            // executa o logout
            document.getElementById("form-logout").submit();
        });
    });

    /*===================================*
	MENU
	*===================================*/
    $(document).ready(function () {
        $("#metismenu").metisMenu();
    });

    /*===================================*
	TOOLTIPS OPTIONS
	*===================================*/
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    /*===================================*
	BOOTSTRAP DATEPICKER
	*===================================*/
    $(document).ready(function () {
        $(".datepicker").datepicker({
            // locale: 'pt-br',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            startDate: new Date().toLocaleString(),
        });
    });

    /*===================================*
	Abre e fecha o menu clicando no "Hamburger"
	*===================================*/
    $(".close-sidebar-btn").click(function () {
        // classe para fechar o menu
        var toggle = $(this).attr("data-class");
        // adiciona ou remove do menu
        $(".app-container").toggleClass(toggle);
    });
    var forEach = function (t, o, r) {
        if ("[object Object]" === Object.prototype.toString.call(t))
            for (var c in t)
                Object.prototype.hasOwnProperty.call(t, c) &&
                    o.call(r, t[c], c, t);
        else for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t);
    };
    // recupera todos os Hamburgers
    var hamburgers = document.querySelectorAll(".hamburger");
    // verifica se encontrou
    if (hamburgers.length > 0) {
        // altera o formato dele
        forEach(hamburgers, function (hamburger) {
            hamburger.addEventListener(
                "click",
                function () {
                    this.classList.toggle("is-active");
                },
                false
            );
        });
    }
})(jQuery);
