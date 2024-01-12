$(document).ready(function()
{
	// binda o campo para nao permitir espacos
	$('.stripspaces').focus(function(e) {
		// adiciona a mascara
		$('.stripspaces')
			.keydown(function(event)
			{
				$(this).val($.trim($(this).val()));
			}
		);
	});

	// binda o campo de cep
	$('.zipcode').focus(function(e) {
		// adiciona mascara
		$('.zipcode').mask("99999-999");
	});

	// binda o campo decimal
	$('.decimal').focus(function(e) {
		// adiciona mascara
		$('.decimal').maskMoney(
		{
            allowNegative: false,
            thousands: '.',
            decimal: ',',
            affixesStay: true
		});
    });

	// binda o campo decimal
	$('.weight').focus(function(e) {
		// adiciona mascara
		$('.weight').maskMoney(
		{
            allowNegative: false,
            thousands: '.',
			decimal: ',',
			precision: 3,
            affixesStay: true
		});
    });

	// binda o campo de moeda
	$('.money').focus(function(e) {
		// adiciona mascara
		$('.money').maskMoney(
        {
            prefix: 'R$ ',
            allowNegative: false,
            thousands: '.',
            decimal: ',',
            affixesStay: true
        });
    });

	// binda o campo de data
	$('.date').focus(function(e) {
		// adiciona mascara
		$('.date').mask("99/99/9999");
	});

	// binda o campo de ssn
	$('.ssn').focus(function(e) {
		// adiciona mascara
		$('.ssn').mask("999.999.999-99");
	});

	// binda o campo de cnpj
	$('.cnpj').focus(function(e) {
		// adiciona mascara
		$('.cnpj').mask("99.999.999/9999-99");
	});

	// binda o campo de phone
	$('.phone').focus(function(e) {
		// adiciona mascara
		$('.phone')
			.mask("(99) 99999999?9")
			.focusin(function(event)
			{
				$(this).unmask();
				$(this).mask("(99) 99999999?9");
			})
			.focusout(function(event)
			{
				var phone, element;
				element = $(this);
				phone = element.val().replace(/\D/g, '');
				element.unmask();

				if (phone.length > 10) {
					element.mask("(99) 99999-999?9");
				} else {
					element.mask("(99) 9999-9999?9");
				}
			}
		);
	});
});
