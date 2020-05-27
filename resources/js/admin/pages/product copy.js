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
	 * Customiza os input="file" - Nome do input File
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
		var $cloned = $buttonAdd.closest('.row-item').clone(true);
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
			// limpa os campos
			if ($(this).prop('type') === 'text' || $(this).prop('type') === 'number') {
				$(this).val('').end();
			}
			if ($(this).prop('type') === 'file') {
				$(this).val('').end();
				$(this).parent().find('.custom-file-label').html('');
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
		$buttonAdd.closest('.row-item').after($cloned);
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
		// remove o bloco
		$(this).closest('.row-item').remove();
	});


	/**
	 * Adiciona um bloco de informacoes expecificas
	 *
	 */
	$('.add-product').on('click', function (e) {
		// Method cancels the event if it is cancelable
		e.preventDefault();
		// recupera o botao do click
		var $buttonAdd = $(this);
		// recupera o elemento referente a este bloco
		var $element = $buttonAdd.parent();
		// faz um clone de todo o bloco
		var $cloned = $buttonAdd.closest('.row-product').clone(true);
		// contador
		var $counter = (parseInt($('#count-product').val()) + 1);


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
			// limpa os campos
			if ($(this).prop('type') === 'text' || $(this).prop('type') === 'number') {
				$(this).val('').end();
			}
			if ($(this).prop('type') === 'file') {
				$(this).val('').end();
				$(this).parent().find('.custom-file-label').html('');
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
		$buttonAdd.closest('.row-product').after($cloned);
		// remove o botao de adicionar
		$buttonAdd.remove();
		// adiciona o botao de "remover"
		$('.remove-product', $element).removeClass('hide');
		// acrescenta um no contador
		$('#count-product').val($counter);
	});

	/**
	 * Remove um bloco de informacoes expecificas
	 *
	 */
	$('.remove-product').on('click', function (e) {
		// Method cancels the event if it is cancelable
		e.preventDefault();
		// remove o bloco
		$(this).closest('.row-product').remove();
	});




});








	/**
	 * Adiciona um bloco de informacoes expecificas
	 *
	 *
	$('.add-item').on('click', function (e) {
		// Method cancels the event if it is cancelable
		e.preventDefault();
		// recupera o botao do click
		var $buttonAdd = $(this);
		// recupera o elemento referente a este bloco
		var $element = $buttonAdd.parent();
		// faz um clone de todo o bloco
		var $cloned = $buttonAdd.closest('.row-item').clone(true);
		// contador
		var $counter = (parseInt($('#count-item').val()) + 1);


		// faz um clone dos dois bootstrap-select
		var $bootstrapSelect = $cloned.find('.bootstrap-select');
		// recupera o bootstrap-selec deste bloco
		var $selectPicker = $bootstrapSelect.find('.selectpicker');
		// deixa o selectpicker sem nada selecionado
		$selectPicker.each(function (index)
		{
			var $field = $(this).data('name');
			var $label = $(this).closest('.div-' + $field).find('label');
			var $span  = $(this).closest('.div-' + $field).find('span');
			// altera o "id" e "name" do select
			$(this).attr('id', 'item[' + $counter + '][' + $field + ']');
			$(this).attr('name', 'item[' + $counter + '][' + $field + ']');
			// altera o "for" da label
			$label.attr('for', 'item[' + $counter + '][' + $field + ']');
			// altera o "span" de notification
			$span.attr('for', 'item[' + $counter + '][' + $field + ']');
			// limpa o selectpicker
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
		$inputs.each(function ()
		{
			var $field = $(this).data('name');
			var $label = $(this).closest('.div-' + $field).find('label');
			var $span  = $(this).closest('.div-' + $field).find('span');
			// altera o "id" e "name" do select
			$(this).attr('id', 'item[' + $counter + '][' + $field + ']');
			$(this).attr('name', 'item[' + $counter + '][' + $field + ']');
			// altera o "for" da label
			$label.attr('for', 'item[' + $counter + '][' + $field + ']');
			// altera o "span" de notification
			$span.attr('for', 'item[' + $counter + '][' + $field + ']');

			// limpa os campos
			if ($(this).prop('type') === 'text' || $(this).prop('type') === 'number') {
				$(this).val('').end();
			}
			if ($(this).prop('type') === 'file') {
				$(this).val('').end();
				$(this).parent().find('.custom-file-label').html('');
			}
			if ($(this).prop('type') === 'checkbox') {
				$(this).prop('checked', false);
			}
		});

		// adiciona o clone abaixo do bloco que ja existe
		$buttonAdd.closest('.row-item').after($cloned);
		// remove o botao de adicionar
		$buttonAdd.remove();
		// adiciona o botao de "remover"
		$('.remove-item', $element).removeClass('hide');
		// acrescenta um no contador
		$('#count-item').val($counter);
	});
	*/
