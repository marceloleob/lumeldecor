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
				colors: {
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
				themes: {
					required: true,
				},
				launch: {
					required: false,
				},
			}
		});
		jQuery.validator.addClassRules("custom-file-input", {
			required: function () {
				return ($('#picture').val() === '');
			},
		});
	}

	/**
	 * Customiza os input="file" - Nome do input File
	 *
	 */
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	/**
	 * Binda o campo do Preco no Site para calcular o Lucro
	 *
	 */
	$('#s_price').blur(function () {
		// executa a funcao apenas se existir os dois valores
		if ($(this).val() !== '' && $('#p_price').val() !== '') {
			calcProfit();
		}
	});

	/**
	 * Binda o campo do Preco no Fornecedor para calcular o Lucro
	 *
	 */
	$('#p_price').blur(function () {
		// executa a funcao apenas se existir os dois valores
		if ($(this).val() !== '' && $('#s_price').val() !== '') {
			calcProfit();
		}
	});

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
