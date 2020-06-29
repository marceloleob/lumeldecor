<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Color;
use App\Models\Item;
use App\Models\Material;
use App\Models\ProductSize;
use App\Models\Theme;

class SearchService
{
	public static $data;
	public static $query;
	public static $paginate;

	/**
	 * Recupera todos os produtos referentes ao material informado
	 *
	 * @param string $table
	 * @param string $slug
	 * @return array
	 */
	public static function productList($table, $slug)
	{
		self::$query = Item::inRandomOrder()
			->whereHas(
				'product', function ($subQuery) use ($table, $slug)
				{
					$subQuery
						->where('done', config('constants.DONE.ACTIVE'))
						->where('status', config('constants.STATUS.ACTIVE'));

					// executa o filtro pelo nome do produto
					if ($table === 'produto') {
						$subQuery->where('name', 'LIKE', '%' . $slug . '%');
					}
					// executa o filtro pelo material
					if ($table === 'material') {
						$subQuery->whereHas(
							'material', function ($subQuery) use ($slug)
							{
								$subQuery->where('slug', $slug);
							}
						);
					}
					// executa o filtro pelo categoria
					if ($table === 'categoria') {
						$subQuery->whereHas(
							'category', function ($subQuery) use ($slug)
							{
								$subQuery->where('slug', $slug);
							}
						);
					}
				}
			)
			->where('status', config('constants.STATUS.ACTIVE'));

		// executa o filtro pelo cor
		if ($table === 'tons') {
			self::$query->whereHas('tones', function ($subQuery) use ($slug)
			{
				$subQuery->whereHas('colors', function ($subSubQuery) use ($slug)
				{
					$subSubQuery->where('slug', $slug);
				});
			});
		}
		// executa o filtro pelo tema
		if ($table === 'tema') {
			self::$query->whereHas('themes', function ($subQuery) use ($slug)
			{
				$subQuery->where('slug', $slug);
			});
		}

		// cria a paginacao
		self::pagination($table, $slug);
		// formata os dados
		self::format();

		return [
			'type'     => $table,
			'current'  => $slug,
			'data'     => self::$data,
			'title'    => self::setTitle($table, $slug),
			'paginate' => self::$paginate,
		];
	}

    /**
     * Handler paginator
	 *
	 * @param string $table
	 * @param string $slug
     * @return void
     */
	public static function pagination($table, $slug)
	{
		// recupera os dados paginados
		self::$data = self::$query->paginate(10);
		// adiciona parametro do filtro no paginate
		self::$data->appends([$table => $slug]);
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
	 * Recupera o nome correspondente da pagina de lista de produtos
	 *
	 * @param string $table
	 * @param string $slug
	 * @return string
	 */
	public static function setTitle($table, $slug)
	{
		if ($table === 'produto') {
			return '"' . Material::where('slug', $slug)->first()->name . '"';
		}
		if ($table === 'material') {
			return 'Produtos de ' . Material::where('slug', $slug)->first()->name;
		}
		if ($table === 'categoria') {
			return 'Lista de ' . Category::where('slug', $slug)->first()->name;
		}
		if ($table === 'tons') {
			return 'Produtos com tons de "' . Color::where('slug', $slug)->first()->name . '"';
		}
		if ($table === 'tema') {
			return 'Produtos do tema "' . Theme::where('slug', $slug)->first()->name . '"';
		}
	}

    /**
     * Retorna as informacoes importantes para renderizar os detalhes de um produto
	 *
	 * @param string $table
	 * @param string $slug
	 * @param string $product
	 * @param string $size
	 * @param string $sku
     * @return array
     */
	public static function productDetail($table, $slug, $product, $size, $sku)
	{
		if (!empty($sku)) {
			// recupera os detalhes do item pelo codigo
			$item = tap(Item::where('code', $sku)->firstOrFail(), function ($item)
				{
					$tones = ToneService::format($item->tones);
					$item->tooltip    = $tones['tooltip'];
					$item->background = $tones['background'];
				});

		} else {

			// recupera os detalhes do item pelo tamanho
			$item = tap(Item::whereHas(
				'product', function ($subQuery) use ($product)
				{
					$subQuery->where('slug', $product);
				})
				->whereHas(
				'productSize', function ($subQuery) use ($size)
				{
					$subQuery
						->where('size', $size)
						->orderBy('size');
				})
				->firstOrFail(), function ($item)
				{
					$tones = ToneService::format($item->tones);
					$item->tooltip    = $tones['tooltip'];
					$item->background = $tones['background'];
				});
		}

		// recupera os tamanhos disponiveis do item
		$sizes = ProductSize::whereHas(
			'product', function ($subQuery) use ($product)
			{
				$subQuery->where('slug', $product);
			})
			->get()
			->map(function ($size) use ($item)
			{
				if ($size->size === $item->productSize->size) {
					$size->active = 'class="active"';
				} else {
					$size->active = '';
				}

				return $size;
			});

		// recupera todos os itens iguais para extrair as cores disponiveis
		$colors = Item::where('product_id', $item->product_id)
			->where('product_size_id', $item->product_size_id)
			->get()
			->map(function ($color) use ($item)
			{
				$tones = ToneService::format($color->tones);
				$color->tooltip    = $tones['tooltip'];
				$color->background = $tones['background'];

				if ($color->id === $item->id) {
					$color->active = 'class="active"';
				} else {
					$color->active = '';
				}

				return $color;
			});

		return [
			'type'    => $table,
			'current' => $slug,
			'item'    => $item,
			'sizes'   => $sizes,
			'colors'  => $colors,
			'title'   => $item->product->name . ' - ' . $item->productSize->size,
		];
	}
}
