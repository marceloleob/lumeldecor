$(document).ready(function ()
{
    // validacao do formulario de contato
	if ($('#form-contact').length) {
		// validation
		$('#form-contact').validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
				email: {
					required: true,
					minlength: 3,
					maxlength: 100,
					email: true,
				},
				phone: {
					required: true,
					phoneOnly: true,
					minlength: 14,
					maxlength: 15,
				},
				subject: {
					required: true,
					minlength: 2,
					maxlength: 100,
				},
				text: {
					required: true,
					minlength: 5,
					maxlength: 2000,
				}
			}
		});
    }
});
