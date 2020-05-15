$(document).ready(function ()
{
	// Validacao do formulario
	if ($('#form-product').length) {
		// validation
		$('#form-product').validate({
			rules: {
				supplier_id: {
					required: true,
				},
				material_id: {
					required: true,
				},
				category_id: {
					required: true,
				},
				name: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
			}
		});
	}

	/**
	 * Nome do input File
	 *
	 */
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	/**
	 * Adiciona um bloco de informacoes expecificas
	 *
	 */
	$('.add-color').on('click', function (e) {
		// Method cancels the event if it is cancelable
		e.preventDefault();
		// recupera o botao do click
		var $buttonAdd = $(this);
		// recupera o elemento referente a este bloco
		var $element = $buttonAdd.parent();
		// faz um clone de todo o bloco
		var $cloned = $buttonAdd.closest('.row-piece').clone(true);
		// contador
		var $counter = (parseInt($('#count-color').val()) + 1);


		// faz um clone dos dois bootstrap-select
		var $bootstrapSelect = $cloned.find('.bootstrap-select');
		// recupera o bootstrap-selec deste bloco
		var $selectPicker = $bootstrapSelect.find('.selectpicker');
		// deixa o selectpicker sem nada selecionado
		$selectPicker.each(function (index) {
			$(this).data('selectpicker', null);
		});
		// atualiza o bootstrap-select com o select-picker limpo
		$bootstrapSelect.each(function (index) {
			$(this).replaceWith(function() {
				return $selectPicker.get(index);
			});
		});
		// cria uma instancia nova dos selectpicker
		$selectPicker.each(function (index) {
			$(this).selectpicker({
				noneSelectedText: 'Selecione',
				size: 7
			}).end();
		});

		// recupera os inputs (amount, photo, launch)
		var $inputs = $cloned.find('input');
		// percorre os inputs
		$inputs.each(function () {
			if ($(this).prop('type') === 'text' || $(this).prop('type') === 'number' || $(this).prop('type') === 'file') {
				$(this).val('').end();
			}
			if ($(this).prop('type') === 'checkbox') {
				$(this).prop('checked', false);
				// altera o id e a label do checkbox
				var $input = $(this);
				var $label = $(this).parent().find('label');
				$input.attr('id', 'checkbox-launch-' + $counter);
				$label.attr('for', 'checkbox-launch-' + $counter);

			}
		});

		// adiciona o clone abaixo do bloco que ja existe
		$buttonAdd.closest('.row-piece').after($cloned);
		// remove o botao de adicionar
		$buttonAdd.remove();
		// adiciona o botao de "remover"
		$('.remove-color', $element).removeClass('hide');
		// acrescenta um no contador
		$('#count-color').val($counter);
	});

	/**
	 * Remove um bloco de informacoes expecificas
	 *
	 */
	$('.remove-color').on('click', function (e) {
		// Method cancels the event if it is cancelable
		e.preventDefault();
		// recupera o bloco referente a este bloco
		var $element = $(this).parent().parent().parent();
		// remove o bloco
		$element.remove();
	});
});
