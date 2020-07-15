// const { isSet } = require("lodash");

$(document).ready(function ()
{
	// Validacao do formulario de compra
	if ($('#form-shop').length) {
		// validation
		$('#form-shop').validate({
			rules: {
				quantity: {
					required: true,
					digits: true,
					min: 1,
				},
			}
		});
	}

	/**
	 * Binda o botao para calcular o Frete
	 *
	 */
	if ($('.btn-shipping').length)
	{
		$('.btn-shipping').click(function (event) {
			// Method cancels the event if it is cancelable
			event.preventDefault();
			// verifica se pode calcular o frete
			handleShipping();
		});

		$('#zipcode').keypress(function (event) {
			// Method cancels the event if it is cancelable
			event.preventDefault();

			if (event.which === 13) {
				// verifica se pode calcular o frete
				handleShipping();
			}
		});
	}

	/**
	 * Executa o metodo para checar se pode calcular o frete
	 *
	 */
	function handleShipping()
	{
		if ($('#item').val() === '' || $('#zipcode').val() === '') {
			$('.shipping-result').html('<span class="text_default error">É necessário digitar o CEP</span>');
			return false;
		}

		$('.shipping-result').html('<span class="loading"></span>');

		calcShipping($('#item').val(), $('#zipcode').val(), $('#quantity').val());
	}

    /**
	 * Funcao que executa o ajax
     *
	 * @param integer item
	 * @param integer zipcode
	 * @param integer quantity
	 */
	function calcShipping(item, zipcode, quantity)
	{
		// carrega o combo
		$.ajax({
			url: '../../../../product/calculator',
			type: 'POST',
            dataType: 'json',
			data: {
				item: item,
				zipcode: zipcode,
				quantity: quantity,
			},
			success: function(response)
			{
				if (response.error) {
					$('.shipping-result').html('<span class="text_default error">Erro ao consultar seu CEP nos Correios, por favor tente novamente mais tarde.</span>');
					console.log(response.error);
					return false;
				}

				var html  = '<div class="table-freight text_dark_gray">';
					html += '<span><i class="far fa-calendar-alt text_default px-2"></i> PAC (' + response.PrazoEntrega + ' dias úteis)</span>';
					html += '<span class="pr-2">R$ ' + response.Valor + '</span>';
					html += '</div>';

				$('.shipping-result').html(html);
            }
        });
    }
});
