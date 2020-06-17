$(document).ready(function ()
{
	// verficica se esta renderizando os radios de action
	if ($('.action').length)
	{
		$('.action').change(function (event) {
			// Method cancels the event if it is cancelable
			event.preventDefault();

			var combobox = $('select[name="reason_id"]');

			combobox.selectpicker('refresh').empty();
			combobox.selectpicker({title: 'Carregando...'})
			combobox.selectpicker('render');
			// carrega o combo
			loadReason($(this).val());
		});
	}

    /**
	 * Funcao que executa o ajax
     *
     * @param integer action
	 */
	function loadReason(action)
	{
		// carrega o combo
		$.ajax({
			url: '../../reason/options',
			type: 'POST',
            dataType: 'html',
			data: {
				action: action,
			},
			success: function(response)
			{
				var combobox = $('#reason_id');

				combobox.selectpicker('refresh');
				combobox.selectpicker({title: 'Selecione um Motivo'})
                combobox.append(response);
				combobox.selectpicker('render');
                combobox.selectpicker('refresh');
            }
        });
    }
});
