<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;

class CategoryService
{
	/**
	 * Gerencia o metodo save e update das categorias
	 *
	 * @param array   $data
	 * @param integer $categoryId
	 * @return \App\Models\Category
	 */
    public static function store($data = [], $categoryId = null)
    {
		// cria uma slug
		$data['slug'] = Str::slug($data['name']);

		return (new CategoryRepository())->store($data);
	}
}
