<?php

namespace App\Services;

use App\Services\BaseService;
use Illuminate\Support\Facades\Mail;
use Exception;

class ContactService extends BaseService
{

	/**
	 * Send emails (company and customer) from Contact Page
	 *
	 * @param array $data
	 * @return void
	 */
	public static function send($data)
	{
		try {
			// envia email para a empresa
			Mail::send('emails.pages.tocompany', $data, function ($message) {
				// seta os paramentros no email
				$message
					->to(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))
					->subject(trans('pages/contact.email.company.subject'));
			});

			// envia email para o usuario
			Mail::send('emails.pages.tocustomer', $data, function ($message) use ($data) {
				// seta os paramentros no email
				$message
					->to($data['email'], $data['name'])
					->subject(trans('pages/contact.email.customer.subject'));
			});
			// retorna a entidade criada ou atualizada
			return [
				'type'    => 'success',
				'message' => trans('pages/contact.feedback.success')
			];

		} catch (Exception $exception) {
			// retorna a entidade criada ou atualizada
			return [
				'type'    => 'error',
				'message' => trans('pages/contact.feedback.error'),
				'error'   => $exception,
			];
		}
	}
}
