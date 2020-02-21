<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;
use App\Services\CaptchaService;
use App\Services\ContactService;

class ContactController extends Controller
{
	/**
	 * Page response
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('site.pages.contact');
	}

	/**
	 * Save after validated()
	 *
	 * @param ContactRequest $request
	 * @return Response
	 */
	public function send(ContactRequest $request)
	{
		// sanitized and validated data
		$data = $request->validated();

		// valida o captcha
		$result = CaptchaService::check($request['recaptcha']);
		// verifica se validou
		if ($result->success != true) {
			return redirect()->route('contact')->with('error', trans('validation.google'));
		}

		// save
		$response = ContactService::send($data);
		// check error
		if ($response['type'] == 'error') {
			return redirect()->route('contact')->with('error', $response['message'])->withInput();
		}

		return redirect()->route('contact')->with('success', $response['message']);
	}

}
