$(document).ready(function ()
{
    // validacao do formulario de busca
	if ($('#form-search').length) {
		// validation
		$('#form-search').validate({
			rules: {
				teste: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
			}
		});
	}

	$('#btn-search').click(function (event) {
		// Method cancels the event if it is cancelable
		event.preventDefault();
		// executa a busca
		redirectSearch();
	});

	$('#input-search').keypress(function (event) {

		if (event.which === 13) {
			// executa a busca
			redirectSearch();
		}
	});

	function redirectSearch()
	{
		if ($('#input-search').val() === '') {
			return false;
		}

		window.location = $('#url').val() + '/produto/nome/' + $('#input-search').val();
	}
});
