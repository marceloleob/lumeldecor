<?php

namespace App\Services;

use App\Models\Item;
use App\Models\ProductSize;

class SearchService
{
	public static $data;
	public static $query;
	public static $paginate;

	/**
	 * Recupera todos os produtos referentes ao material informado
	 *
	 * @param string $type
	 * @param string $search
	 * @return array
	 */
	public static function productList($type, $search)
	{
		self::$query = Item::inRandomOrder()
			->whereHas(
				'product', function ($subQuery) use ($type, $search)
				{
					$subQuery
						->where('done', config('constants.DONE.ACTIVE'))
						->where('status', config('constants.STATUS.ACTIVE'));

					// executa o filtro pelo nome do produto
					if ($type === 'nome') {
						$subQuery->where('name', 'LIKE', '%' . $search . '%');
					}
					// executa o filtro pelo material
					if ($type === 'material') {
						$subQuery->whereHas(
							'material', function ($subQuery) use ($search)
							{
								$subQuery->where('slug', $search);
							}
						);
					}
					// executa o filtro pelo categoria
					if ($type === 'categoria') {
						$subQuery->whereHas(
							'category', function ($subQuery) use ($search)
							{
								$subQuery->where('slug', $search);
							}
						);
					}
				}
			)
			->where('status', config('constants.STATUS.ACTIVE'));

		// executa o filtro pelo tema
		if ($type === 'tema') {
			self::$query->whereHas('themes', function ($subQuery) use ($search)
			{
				$subQuery->where('slug', $search);
			});
		}
		// executa o filtro pelo cor
		if ($type === 'cor') {
			self::$query->whereHas('tones', function ($subQuery) use ($search)
			{
				$subQuery->whereHas('colors', function ($subSubQuery) use ($search)
				{
					$subSubQuery->where('slug', $search);
				});
			});
		}

		self::pagination($type, $search);
		self::format();

		return [
			'data'     => self::$data,
			'paginate' => self::$paginate,
		];
	}

    /**
     * Handler paginator
	 *
	 * @param string $type
	 * @param string $search
     * @return void
     */
	public static function pagination($type, $search)
	{
		// recupera os dados paginados
		self::$data = self::$query->paginate(10);
		// adiciona parametro do filtro no paginate
		if ($type === 'nome') {
            self::$data->appends(['search' => $search]);
		}
		// adiciona parametro do filtro no paginate
		if ($type === 'material') {
            self::$data->appends(['material' => $search]);
		}
		// adiciona parametro do filtro no paginate
		if ($type === 'categoria') {
            self::$data->appends(['categoria' => $search]);
		}
        // constroi o paginate para a view
		self::$paginate = self::$data;
	}

	/**
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public static function format()
	{
		// Percorre toda a Collection
		self::$data->map(function ($collection)
		{
			// verifica se o item e lancamento
			if ($collection->launch == config('constants.LAUNCH.ACTIVE')) {
				$collection->launch = '<span class="pr_flash"><i class="fas fa-rocket launch"></i></span>';
			} else {
				$collection->launch = '';
			}
		});
	}

    /**
     * Retorna as informacoes importantes para renderizar os detalhes de um produto
	 *
	 * @param string $slug
	 * @param string $sku
     * @return array
     */
	public static function productDetail($slug, $sku)
	{
		// recupera os detalhes do item
		$item = Item::with('tones')->where('code', $sku)->firstOrFail();
		// recupera os tamanhos disponiveis do item
		$sizes = ProductSize::whereHas(
			'product', function ($subQuery) use ($slug)
			{
				$subQuery->where('slug', $slug);
			})
			->get();
		// recupera todos os itens iguais para extrair as cores disponiveis
		$colors = Item::where('product_id', $item->product_id)
			->where('product_size_id', $item->product_size_id)
			->get()
			->map(function ($item)
			{
				$tones = ToneService::format($item->tones);
				$item->colorId    = $tones['colorId'];
				$item->tooltip    = $tones['tooltip'];
				$item->background = $tones['background'];

				return $item;
			});

		return [
			'item'   => $item,
			'sizes'  => $sizes,
			'colors' => $colors,
		];
	}
}
