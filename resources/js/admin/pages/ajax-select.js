$(document).ready(function ()
{
	// Combo AJAX
	if ($('select[name="category_id"]').length) {
		// verifica se o combo ja tem valor setado
		if ($('input[name="category_id_hide"]').val()) {
			// binda o combo
			setTimeout(function() {
                // recupera o valor do combo principal
                var materialId = $('select[name="material_id"]').val();
				var categoryId = $('input[name="category_id_hide"]').val();
                // carrega o combo de categorias
				loadCategory(materialId, categoryId, '../../category/options')
            }, 1000);
        }

        // binda combo
        $('select[name="material_id"]').change(function()
        {
            var combobox = $('select[name="category_id"]');
            combobox.empty();
            combobox.prepend($('<option></option>').html('Carregando...'));
            combobox.selectpicker('refresh');
            // carrega o combo
            loadCategory($(this).val(), null, '../category/options');
        });
	}

    /**
	 * Funcao que executa o ajax
     *
     * @param integer materialId
     * @param integer categoryId
     * @param string  url
	 */
	function loadCategory(materialId, categoryId, url)
	{
		// carrega o combo
		$.ajax({
			url: url,
			type: 'POST',
            dataType: 'html',
			data: {
				material: materialId,
				category: categoryId,
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
