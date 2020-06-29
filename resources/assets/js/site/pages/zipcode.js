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
					digits: true,
				},
			}
		});
	}

	// /**
	//  * Binda as opcoes de "acao" e carrega a razao caso alterado a acao
	//  *
	//  */
	// if ($('.action').length)
	// {
	// 	$('.action').change(function (event) {
	// 		// Method cancels the event if it is cancelable
	// 		event.preventDefault();

	// 		var combobox = $('select[name="reason_id"]');

	// 		combobox.selectpicker('refresh').empty();
	// 		combobox.selectpicker({title: 'Carregando...'})
	// 		combobox.selectpicker('render');
	// 		// carrega o combo
	// 		loadReason($(this).val());
	// 	});
	// }

    // /**
	//  * Funcao que executa o ajax
    //  *
    //  * @param integer action
	//  */
	// function loadReason(action)
	// {
	// 	// carrega o combo
	// 	$.ajax({
	// 		url: '../../reason/options',
	// 		type: 'POST',
    //         dataType: 'html',
	// 		data: {
	// 			action: action,
	// 		},
	// 		success: function(response)
	// 		{
	// 			var combobox = $('#reason_id');

	// 			combobox.selectpicker('refresh');
	// 			combobox.selectpicker({title: 'Selecione um Motivo'})
    //             combobox.append(response);
	// 			combobox.selectpicker('render');
    //             combobox.selectpicker('refresh');
    //         }
    //     });
    // }
});
