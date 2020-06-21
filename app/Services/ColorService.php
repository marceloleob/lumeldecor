<?php

namespace App\Services;

use App\Repositories\ColorRepository;
use Illuminate\Support\Str;

class ColorService
{
	/**
	 * Gerencia o metodo save e update das cores
	 *
	 * @param array   $data
	 * @param integer $colorId
	 * @return \App\Models\Color
	 */
    public static function store($data = [], $colorId = null)
    {
		// cria uma slug
		$data['slug'] = Str::slug($data['name']);

		return (new ColorRepository())->store($data);
	}
}
