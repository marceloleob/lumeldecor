$(document).ready(function ()
{
	/**
	 * Validacao do formulario
	 *
	 */
	if ($('#form-item').length) {
		// validation
		$('#form-item').validate({
			rules: {
				product_id: {
					required: true,
				},
				product_size_id: {
					required: true,
				},
				"tones[]": {
					required: true,
				},
				supplier_id: {
					required: true,
				},
				s_price: {
					required: true,
				},
				p_price: {
					required: true,
				},
				amount: {
					required: function () {
						return ($('#id').length === 0);
					},
					digits: true,
				},
				"themes[]": {
					required: false,
				},

			}
		});
		jQuery.validator.addClassRules("required-file-input", {
			required: function () {
				return ($('#id').length === 0);
			},
			extension: true,
		});
	}

	/**
	 * Customiza os input="file" - Nome do input File
	 *
	 */
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		// $(this).siblings(".custom-file-label").addClass("selected").html(fileName.join(', '));
	});

	/**
	 * Binda o campo do Preco no Site para calcular o Lucro
	 *
	 */
	$('#s_price').blur(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// verifica se os precos foram informados
		if (validatePrices()) {
			// calcula o lucro
			calcProfit();
		}
	});

	/**
	 * Binda o campo do Preco no Fornecedor para calcular o Lucro
	 *
	 */
	$('#p_price').blur(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// verifica se os precos foram informados
		if (validatePrices()) {
			// calcula o lucro
			calcProfit();
		}
	});

	/**
	 * Valida os campos de preco
	 *
	 * @return bool
	 */
	function validatePrices()
	{
		// executa a funcao apenas se existir os dois valores
		if ($('#s_price').val() == '' || $('#s_price').val() == '0,00' || $('#p_price').val() == '' || $('#p_price').val() == '0,00') {
			return false;
		}

		return true;
	}

	/**
	 * Calcula o Lucro do item
	 *
	 */
	function calcProfit()
	{
		var style  = 'success';
		// formata o valor "string" para "float"
		var sPrice = parseFloat($('#s_price').val().replace('.', '').replace(',', '.'));
		var pPrice = parseFloat($('#p_price').val().replace('.', '').replace(',', '.'));

		var gross  = (sPrice - pPrice);
		var profit = parseFloat((gross * 100) / pPrice).toFixed(2);

		// verifica se o lucro foi bom ou ruim
		if (profit <= 10) {
			style = 'danger';
		}
		if (profit > 10 && profit < 100) {
			style = 'warning';
		}

		$('.profit-margin').html('<span class="text-' + style + '">' + profit.replace('.', ',') + '% de lucro</span>');
	}
});
