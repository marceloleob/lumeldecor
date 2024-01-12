<?php

namespace App\Services;

class SkuService
{
	/**
	 * Cria um codigo unico para cada item de produto
	 *
	 * @param Product     $product
	 * @param ProductSize $product
	 * @param Tone        $tones
	 * @return string
	 */
	public static function generate($product, $productSize, $tones)
	{
		// forca os codigos das cores terem 2 numeros
		$tones->transform(function ($id) {
			return str_pad($id, 2, '0', STR_PAD_LEFT);
		});
		// mescla os codigos (3 codigos no maximo)
		$colors = $tones->flatten()->implode('');

		// $materialCode = str_pad($product->material->id, 2, '0', STR_PAD_LEFT);
		// $categoryCode = str_pad($product->category->id, 2, '0', STR_PAD_LEFT);
		$productCode  = str_pad($product->id, 4, '0', STR_PAD_LEFT);
		$colorCode    = str_pad($colors, 6, '0', STR_PAD_LEFT);
		$sizeCode     = str_pad($productSize->size, 2, '0', STR_PAD_LEFT);

		return 'LM' . $productCode . $sizeCode . $colorCode;
	}
}
