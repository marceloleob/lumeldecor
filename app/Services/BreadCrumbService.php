<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Theme;

class BreadCrumbService
{
	/**
	 * Recupera o nome correspondente da pagina de lista de produtos
	 *
	 * @param string $table
	 * @param string $search
	 * @return string
	 */
	public static function setTitle($table, $search)
	{
		if ($table === 'busca') {
			return ['Busca', strtoupper($search)];
		}
		if ($table === 'material') {
			return ['Material', Material::where('slug', $search)->first()->name];
		}
		if ($table === 'categoria') {
			return ['Categoria', Category::where('slug', $search)->first()->name];
		}
		if ($table === 'tons') {
			return ['Cor', Color::where('slug', $search)->first()->name];
		}
		if ($table === 'tema') {
			return ['Tema', Theme::where('slug', $search)->first()->name];
		}
	}
}
