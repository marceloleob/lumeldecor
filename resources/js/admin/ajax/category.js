$(document).ready(function ()
{
	// verficica se esta renderizando o select de categoria
	if ($('select[name="category_id"]').length)
	{
		// verifica se o select ja tem valor setado
		if ($('input[name="category_id_hide"]').val())
		{
			// aciona a funcao para carregar e setar a categoria
			setTimeout(function() {
                // recupera o valor dos selects
                var materialId = $('select[name="material_id"]').val();
				var categoryId = $('input[name="category_id_hide"]').val();
                // carrega o select de categorias
				loadCategory(materialId, categoryId)
            }, 1000);
		}

		// caso tenha material selecionado mas nao tenha categoria
		if ($('select[name="material_id"]').val() && !$('input[name="category_id_hide"]').val())
		{
			var combobox = $('select[name="category_id"]');

			combobox.selectpicker('refresh');
			combobox.selectpicker({title: 'Carregando...'})
			combobox.selectpicker('render');
			// carrega o combo
			loadCategory($('select[name="material_id"]').val(), null);
		}

		// binda o select de material
		$('select[name="material_id"]').change(function()
		{
			var combobox = $('select[name="category_id"]');

			combobox.selectpicker('refresh');
			combobox.selectpicker({title: 'Carregando...'})
			combobox.selectpicker('render');
			// carrega o combo
			loadCategory($(this).val(), null);
		});
	}

    /**
	 * Funcao que executa o ajax
     *
     * @param integer materialId
     * @param integer categoryId
	 */
	function loadCategory(materialId, categoryId)
	{
		var url = '../category/options';
		// verifica se esta no formulario de edicao
		if ($('#id').length) {
			var url = '../../category/options';
		}
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

				combobox.selectpicker('refresh');
				combobox.selectpicker({title: 'Selecione uma Categoria'})
                combobox.append(response);
				combobox.selectpicker('render');
                combobox.selectpicker('refresh');
            }
        });
    }
});
