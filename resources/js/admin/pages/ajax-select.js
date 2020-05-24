$(document).ready(function ()
{
	// Combo AJAX
	if ($('select[name="category_id"]').length) {
		// verifica se o combo ja tem valor setado
		if ($('input[name="category_id"]').val()) {
			// binda o combo
			setTimeout(function() {
                // recupera o valor do combo principal
                var material = $('select[name="material_id"]').val();
                // carrega o combo de categorias
				loadCategory(material)
            }, 2000);
        }

        // binda combo
        $('select[name="material_id"]').change(function()
        {
            var combobox = $('select[name="category_id"]');
            combobox.empty();
            combobox.prepend($('<option></option>').html('Carregando...'));
            combobox.selectpicker('refresh');
            // carrega o combo
            loadCategory($(this).val());
        });
	}

    /**
	 * Funcao que executa o ajax
     *
     * @param int value
	 */
	function loadCategory(value)
	{
		// carrega o combo
		$.ajax({
			url: '../category/options',
			type: 'POST',
            dataType: 'html',
			data: {
				material: value,
			},
			success: function(response)
			{
                var combobox = $('select[name="category_id"]');
                combobox.empty();
                combobox.html(response);
                combobox.selectpicker('refresh');
            }
        });
    }
});
