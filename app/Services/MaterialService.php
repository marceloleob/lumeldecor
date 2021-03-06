<?php

namespace App\Services;

use App\Repositories\MaterialRepository;
use Illuminate\Support\Str;

class MaterialService
{
	/**
	 * Gerencia o metodo save e update dos materiais
	 *
	 * @param array   $data
	 * @param integer $materialId
	 * @return \App\Models\Material
	 */
    public static function store($data = [], $materialId = null)
    {
		// cria uma slug
		$data['slug'] = Str::slug($data['name']);

		return (new MaterialRepository())->store($data);
	}

	/**
	 * Retorna o nome do material
	 *
	 * @param string $slug
	 * @return string
	 */
	public static function getNameBySlug($slug)
	{
		$material = (new MaterialRepository())->findBySlug($slug);

		return $material->name;
	}
}
