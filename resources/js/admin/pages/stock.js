$(document).ready(function ()
{
	/**
	 * Validacao do formulario
	 *
	 */
	if ($('#form-stock').length) {
		// validation
		$('#form-stock').validate({
			rules: {
				id: {
					required: true,
				},
				product_id: {
					required: true,
				},
				item_id: {
					required: true,
				},
				reason_id: {
					required: true,
				},
				action: {
					required: true,
				},
				amount: {
					required: true,
					digits: true,
				},
			}
		});
	}

	/**
	 * Atualiza o total do Estoque se alterar a Quantidade
	 *
	 */
	$('#amount').keyup(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// calcula o novo estoque
		newStock();
	});

	/**
	 * Atualiza o total do Estoque se alterar a Acao
	 *
	 */
	$('.action').change(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// calcula o novo estoque
		newStock();
	});

	/**
	 * Funcao para calcular o novo valor do estoque
	 *
	 */
	function newStock()
	{
		var total     = 0;
		var style     = '';
		var current   = parseInt($('#current_amount').val());
		var newAmount = parseInt(($('#amount').val() != '') ? $('#amount').val() : 0);

		if (newAmount === 0) {
			return false;
		}
		if ($('#action-I').is(':checked')) {
			total = current + newAmount;
			style = 'success';
		}
		if ($('#action-O').is(':checked')) {
			total = current - newAmount;
			style = 'danger';
		}

		$('.new-amount').html('<div class="text-' + style + '">' + total + '</div>');
	}
});
