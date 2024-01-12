$(document).ready(function ()
{




	/**
	 * Binda o botao para calcular o Frete
	 *
	 */
	if ($('.btn-shipping-full').length)
	{
		$('.btn-shipping-full').click(function (event) {
			// Method cancels the event if it is cancelable
			event.preventDefault();
			// verifica se pode calcular o frete
			handleAll();
		});

		$('#zipcode').keypress(function (event) {
			// Method cancels the event if it is cancelable
			event.preventDefault();

			if (event.which === 13) {
				// verifica se pode calcular o frete
				handleAll();
			}
		});
	}

	/**
	 * Executa o metodo para checar se pode calcular o frete
	 *
	 */
	function handleAll()
	{
		if ($('#zipcode').val() === '') {
			$('.shipping-result').html('<span class="text_default error">É necessário digitar o CEP</span>');
			return false;
		}

		$('.shipping-result').html('<span class="loading"></span>');

		calcAll($('#zipcode').val(), $('#quantity').val());
	}

    /**
	 * Funcao que executa o ajax
     *
	 * @param integer zipcode
	 * @param integer quantity
	 */
	function calcAll(zipcode, quantity)
	{
		// carrega os dados do frete
		$.ajax({
			url: 'shipping/calculator/all',
			type: 'POST',
            dataType: 'json',
			data: $('#form-shipping-all').serialize(),
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
