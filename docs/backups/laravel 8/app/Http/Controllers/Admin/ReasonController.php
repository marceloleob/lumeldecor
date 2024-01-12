<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ReasonRepository;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
	/**
	 * @var ReasonRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ReasonRepository $repository
	 */
	public function __construct(ReasonRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Return select options of Reason
	 *
	 * @param Request $request
	 * @return array
	 */
	public function options(Request $request)
	{
		return $this->repository->optionsAjax($request->action);
	}
}
