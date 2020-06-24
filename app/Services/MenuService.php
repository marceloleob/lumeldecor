<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\ThemeRepository;

class MenuService
{
	/**
	 * Recupera todas as informacoes para renderizar o menu do site
	 *
	 * @return array
	 */
	public static function render()
	{
		return [
			'materials'  => (new MaterialRepository())->loadMenu(),
			'categories' => (new CategoryRepository())->loadMenu(),
			'colors'     => (new ColorRepository())->loadMenu(),
			'themes'     => (new ThemeRepository())->loadMenu(),
		];
	}
}
