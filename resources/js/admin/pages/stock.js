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
					required: false,
				},
			}
		});
	}
});
