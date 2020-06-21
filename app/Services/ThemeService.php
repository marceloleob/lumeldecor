<?php

namespace App\Services;

use App\Repositories\ThemeRepository;
use Illuminate\Support\Str;

class ThemeService
{
	/**
	 * Gerencia o metodo save e update dos temas
	 *
	 * @param array   $data
	 * @param integer $themeId
	 * @return \App\Models\Theme
	 */
    public static function store($data = [], $themeId = null)
    {
		// cria uma slug
		$data['slug'] = Str::slug($data['name']);

		return (new ThemeRepository())->store($data);
	}
}
