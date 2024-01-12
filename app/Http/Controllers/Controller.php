<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $request;

    /**
     * Recupera o Request
     *
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Metodo para armazenar uma sessao
     *
     * @return void
     */
    public function setSession($name, $value)
    {
        $this->request->session()->put($name, $value);
    }
}
