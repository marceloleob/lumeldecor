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

	/**
	 * Retorna o nome do tema
	 *
	 * @param string $slug
	 * @return string
	 */
	public static function getNameBySlug($slug)
	{
		$theme = (new ThemeRepository())->findBySlug($slug);

		return $theme->name;
	}

	/**
	 * Recupera todos os temas e retorna formatado para CSS/HTML
	 *
	 * @param \App\Models\Tone
	 * @return array
	 */
	public static function format($themes)
	{
		if ($themes->count() === 0) {
			return null;
		}

		$all = [];
		foreach ($themes as $theme) {
			$all[] = $theme->name;
		}
		return implode(', ', $all);
	}
}
