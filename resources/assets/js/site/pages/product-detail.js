$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-zipcode').length) {
		// validation
		$('#form-zipcode').validate({
			rules: {
				zipcode: {
					required: true,
					minlength: 8,
				},
			}
		});
	}

	/**
	 * Binda o botao para calcular o Frete
	 *
	 */
	if ($('.btn-calculator').length)
	{
		$('.btn-calculator').click(function (event) {
			// Method cancels the event if it is cancelable
			event.preventDefault();

			if ($('#item').val() === '' || $('#zipcode').val() === '') {
				$('.shipping-result').html('<span class="text_default error">É necessário digitar o CEP</span>');
				return false;
			}

			$('.shipping-result').html('<span class="loading"></span>');

			calculator($('#item').val(), $('#zipcode').val(), $('#quantity').val());
		});
	}

    /**
	 * Funcao que executa o ajax
     *
	 * @param integer item
	 * @param integer zipcode
	 * @param integer quantity
	 */
	function calculator(item, zipcode, quantity)
	{
		// carrega o combo
		$.ajax({
			url: '../../../../../product/calculator',
			type: 'POST',
            dataType: 'json',
			data: {
				item: item,
				zipcode: zipcode,
				quantity: quantity,
			},
			success: function(response)
			{
				var html  = '<div class="table-freight text_dark_gray">';
					html += '<span><i class="far fa-calendar-alt text_default px-2"></i> PAC (' + response.PrazoEntrega + ' dias úteis)</span>';
					html += '<span class="pr-2">R$ ' + response.Valor + '</span>';
					html += '</div>';

				$('.shipping-result').html(html);
            }
        });
    }
});

/*
SimpleXMLElement {#2476 ▼
  +"Codigo": "04510"
  +"Valor": "24,71"
  +"PrazoEntrega": "8"
  +"ValorSemAdicionais": "24,20"
  +"ValorMaoPropria": "0,00"
  +"ValorAvisoRecebimento": "0,00"
  +"ValorValorDeclarado": "0,51"
  +"EntregaDomiciliar": "S"
  +"EntregaSabado": "N"
  +"obsFim": SimpleXMLElement {#2567}
  +"Erro": "0"
  +"MsgErro": SimpleXMLElement {#2568}
}
*/
