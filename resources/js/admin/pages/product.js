$(document).ready(function ()
{
	/**
	 * Validacao do formulario
	 *
	 * https://jqueryvalidation.org/documentation/
	 */
	if ($('#form-product').length) {
		// validation
		$('#form-product').validate({
			rules: {
				// informacoes basicas
				material_id: {
					required: true,
				},
				category_id: {
					required: true,
				},
				name: {
					required: true,
					minlength: 2,
					maxlength: 300,
				},
				featured: {
					required: false,
				},
				description: {
					required: true,
					minlength: 5,
					maxlength: 2000,
				},
			}
		});
		// adiciona o validator nos campos (array)
		jQuery.validator.addClassRules("select-size", {
			required: true,
		});
		jQuery.validator.addClassRules("input-weight", {
			required: true,
		});
		jQuery.validator.addClassRules("radio-shape", {
			required: true,
		});
		jQuery.validator.addClassRules("input-pro_length", {
			required: true,
		});
		jQuery.validator.addClassRules("input-pro_width", {
			required: true,
		});
		jQuery.validator.addClassRules("input-pro_height", {
			required: true,
		});
		jQuery.validator.addClassRules("input-shi_length", {
			required: true,
		});
		// jQuery.validator.addClassRules("input-shi_width", {
		// 	required: ".shape:checked",
		// });
		jQuery.validator.addClassRules("input-shi_height", {
			required: true,
		});
		jQuery.validator.addClassRules("select-colors", {
			required: true,
		});
		jQuery.validator.addClassRules("select-supplier_id", {
			required: true,
		});
		jQuery.validator.addClassRules("input-s_price", {
			required: true,
		});
		jQuery.validator.addClassRules("input-p_price", {
			required: true,
		});
		jQuery.validator.addClassRules("input-amount", {
			required: true,
			digits: true,
		});
		jQuery.validator.addClassRules("custom-file-input", {
			required: true,
		});
		/**
		 * Valicacao para impedir de selecionar "tamanho unico" e depois adicionar outro tamanho
		 */
		jQuery.validator.addMethod("select-size", function (value, element) {
			if ((value === 'U' && $('.row-product').length > 1)) {
				return this.optional(element) || false;
			}
			return this.optional(element) || true;
		}, '<i class="fas fa-times pr-2 pl-2"></i> Não pode selecionar "tamanho único".');
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
	 * Adiciona um bloco de produto ou item no formulario
	 *
	 */
	$('.btn-add').on('click', function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// recupera o botao do click
		var button = $(this);
		// recupera o tipo do bloco
		var block = button.data('block');
		// recupera o numero do bloco deste botao
		var countProduct = button.data('counterProduct');
		var countItem    = button.data('counterItem');
		// faz um clone de todo o bloco
		var cloned = button.closest(`.row-${block}`).clone(true);

		// tratamento especial para o novo bloco
		handleNewBlock(block, cloned);
		// formata os selects
		cloneSelectPickers(countProduct, countItem, cloned);
		// formata os inputs
		cloneInputs(countProduct, countItem, cloned);
		// atualiza os contadores
		countersUpdate(block, countProduct, countItem, cloned);

		// adiciona o clone abaixo do bloco que ja existe
		button.closest(`.row-${block}`).after(cloned).fadeTo('slow');
		// adiciona o botao de "remover"
		$('.btn-remove', button.parent()).removeClass('hide');
		// remove o botao de adicionar
		button.remove();
	});

	/**
	 * Antes de tratar os campos clonados, verifica os "itens" adicionados
	 * do clone original e remove os "suplicated" porque o clone tem que ser criado
	 * somente com um item
	 */
	function handleNewBlock(block, cloned)
	{
		if (block === 'item') {
			// marca que os proximos blocos sao duplicados
			$(`.row-${block}`).addClass('duplicated');
			// insere uma linha para melhorar a visualizacao
			$('<hr />').insertAfter('.line-item:last-child', cloned);
		}
		if (block === 'product') {
			// remove todos os blocos duplicados do clone original
			cloned.find('.duplicated').remove();
		}
	}

	/**
	 * Atualiza os selectpickers do bloco
	 *
	 * @param countProduct int
	 * @param countItem int
	 * @param cloned object
	 */
	function cloneSelectPickers(countProduct, countItem, cloned)
	{
		// faz um clone dos dois bootstrap-select
		var bootstrapSelect = cloned.find('.bootstrap-select');
		// recupera o bootstrap-selec do bloco
		var selectPicker = bootstrapSelect.find('.selectpicker');
		// deixa o selectpicker sem nada selecionado
		selectPicker.each(function (index)
		{
			var field = $(this).data('name');
			var group = $(this).data('group');
			var label = $(this).closest(`.div-${field}`).find('label');
			var span  = $(this).closest(`.div-${field}`).find('span');

			if (group === 'product') {
				// altera o "id" e "name" do select, "for" da label e "for" do notification
				$(this).attr('id', `product[${countProduct}][${field}]`);
				$(this).attr('name', `product[${countProduct}][${field}]`);
				label.attr('for', `product[${countProduct}][${field}]`);
				span.attr('for', `product[${countProduct}][${field}]`);
			}
			if (group === 'item') {
				// seta o nome padrao do select
				var name = `product[${countProduct}][item][${countItem}][${field}]`;
				// faz o tratamento para campos "multiple"
				if ($(this).hasClass('multiselect')) {
					name = `product[${countProduct}][item][${countItem}][${field}][]`;
				}
				// altera o "id" e "name" do select, "for" da label e "for" do notification
				$(this).attr('id', `product[${countProduct}][item][${countItem}][${field}]`);
				$(this).attr('name', name);
				label.attr('for', `product[${countProduct}][item][${countItem}][${field}]`);
				span.attr('for', `product[${countProduct}][item][${countItem}][${field}]`);
			}

			// limpa o selectpicker
			$(this).data('selectpicker', null);
		});
		// atualiza o bootstrap-select com o select-picker limpo
		bootstrapSelect.each(function (index) {
			$(this).replaceWith(function() {
				return selectPicker.get(index);
			});
		});
		// cria uma instancia nova dos selectpicker
		selectPicker.each(function (index) {
			$(this).selectpicker({
				noneSelectedText: 'Selecione',
				multipleSeparator: ' | ',
				maxOptionsText: 'Limite atingido',
				size: 7
			}).end();
		});
	}

	/**
	 * Atualiza os inputs do bloco
	 *
	 * @param countProduct int
	 * @param countItem int
	 * @param cloned object
	 */
	function cloneInputs(countProduct, countItem, cloned)
	{
		// recupera os inputs
		var inputs = cloned.find('input');

		// percorre os inputs
		inputs.each(function ()
		{
			var value = $(this).val();
			var field = $(this).data('name');
			var group = $(this).data('group');
			var label = $(this).closest(`.div-${field}`).find('label');
			var span  = $(this).closest(`.div-${field}`).find('span');

			if (group === 'product') {
				// altera o "id" e "name" do select, "for" da label e "for" do notification
				$(this).attr('id', `product[${countProduct}][${field}]`);
				$(this).attr('name', `product[${countProduct}][${field}]`);
				label.eq(0).attr('for', `product[${countProduct}][${field}]`);
				span.attr('for', `product[${countProduct}][${field}]`);

				// caso seja um radiobox o id do input deve ser o mesmo do texto
				if ($(this).prop('type') === 'radio') {
					// renomeia o id do input
					$(this).attr('id', `product[${countProduct}][${field}][${value}]`);
					// recupera a label do texto do input radio
					var labelRadio = $(this).closest(`.div-${field}`).find(`.label-${field}-${value}`);
					labelRadio.attr('for', `product[${countProduct}][${field}][${value}]`);
				}
				// forca mostrar o campo "largura"
				if (field === 'pro_width') {
					$(this).closest(`.row-${group}`).find('.div-pro_width').removeClass('hide');
					$(this).closest(`.row-${group}`).find('.div-pro_length').find('label').html('Comprimento');
				}
			}
			if (group === 'item') {
				// altera o "id" e "name" do select, "for" da label e "for" do notification
				$(this).attr('id', `product[${countProduct}][item][${countItem}][${field}]`);
				$(this).attr('name', `product[${countProduct}][item][${countItem}][${field}]`);
				label.attr('for', `product[${countProduct}][item][${countItem}][${field}]`);
				span.attr('for', `product[${countProduct}][item][${countItem}][${field}]`);
			}

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
			if ($(this).prop('type') === 'radio') {
				var radio = $(this).closest(`.div-${field}`).find('input[type="radio"]');
				// forca sempre o primerio radio vir checado
				radio.eq(0).prop('checked', true);
				radio.eq(1).prop('checked', false);
			}
		});
	}

	/**
	 * Atualiza os contadores do bloco
	 *
	 * @param block string
	 * @param countProduct int
	 * @param countItem int
	 * @param cloned object
	 */
	function countersUpdate(block, countProduct, countItem, cloned)
	{
		var button  = cloned.find('.btn-add');

		if (block === 'item') {
			// mantem o valor do contador de produto
			button.data('counterProduct', countProduct);
			// acrescenta um no contador de item
			button.data('counterItem', parseInt(countItem + 1));
		}
		if (block === 'product') {
			// acrescenta um no contador de produto
			button.data('counterProduct', parseInt(countProduct + 1));
			// zera o contador de item
			button.data('counterItem', parseInt(0));
		}
	}

	/**
	 * Remove um bloco de produto ou item no formulario
	 *
	 */
	$('.btn-remove').on('click', function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// recupera o botao do click
		var button = $(this);
		// recupera o tipo do bloco
		var block = button.data('block');
		// remove o bloco
		button.closest(`.row-${block}`).remove();
	});

	/**
	 * Impede de selecionar "tamanho unico" e depois adicionar outro tamanho
	 *
	 */
	$('select.select-size').change(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// recupera o valor selecionado
		var size   = $(this).val();
		var blocks = $('.row-product').length;
		// verifica se tem mais de um bloco criado
		if (blocks > 1 && size === 'U') {
			$(this).val('');
			$(this).selectpicker('refresh');
			return false;
		}
		// veririca se selecionou tamanho unico
		if (size === 'U' || size === '') {
			$('.row-add-product').addClass('hide');
		} else {
			$('.row-add-product').removeClass('hide');
		}
	});

	/**
	 * Altera a opcao de "Comprimento" para "Diametro" caso selecione a forma do produto "Redondo"
	 *
	 */
	$('.radio-shape').change(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();

		// recupera o tipo do bloco
		var group       = $(this).data('group');
		var widthDiv    = $(this).closest(`.row-${group}`).find('.div-pro_width');
		var lengthDiv   = $(this).closest(`.row-${group}`).find('.div-pro_length');
		var lengthlabel = lengthDiv.find('label');

		if ($(this).val() === 'R') {
			// esconde o campo de largura e altera o label do comprimento
			widthDiv.addClass('hide');
			lengthlabel.html('Diâmetro');

		} else if ($(this).val() === 'Q') {
			// mostra o campo de largura e altera o label do diametro
			widthDiv.removeClass('hide');
			lengthlabel.html('Comprimento');
		}
	});

	/**
	 * Duplica a informacao dos campos de "Comprimento"
	 *
	 */
	$('.input-pro_length').keyup(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// recupera o tipo do bloco
		var group = $(this).data('group');
		var div   = $(this).closest(`.row-${group}`).find('.div-shi_length');
		var input = div.find('input');

		input.val($(this).val());
	});

	/**
	 * Duplica a informacao dos campos de "Comprimento"
	 *
	 */
	$('.input-pro_width').keyup(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// recupera o tipo do bloco
		var group = $(this).data('group');
		var div   = $(this).closest(`.row-${group}`).find('.div-shi_width');
		var input = div.find('input');

		input.val($(this).val());
	});

	/**
	 * Duplica a informacao dos campos de "Comprimento"
	 *
	 */
	$('.input-pro_height').keyup(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// recupera o tipo do bloco
		var group = $(this).data('group');
		var div   = $(this).closest(`.row-${group}`).find('.div-shi_height');
		var input = div.find('input');

		input.val($(this).val());
	});
});
