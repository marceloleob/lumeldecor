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
	 * @param string $table
	 * @param string $search
	 * @return array
	 */
	public static function productList($table, $search)
	{
		self::$query = Item::inRandomOrder()
			->whereHas(
				'product', function ($subQuery) use ($table, $search)
				{
					$subQuery
						->where('done', config('constants.RULES.DONE.YES'))
						->where('status', config('constants.RULES.STATUS.ACTIVE'));

					// executa o filtro pelo nome do produto
					if ($table === 'busca') {
						$subQuery->where('name', 'LIKE', '%' . $search . '%');
					}
					// executa o filtro pelo material
					if ($table === 'material') {
						$subQuery->whereHas(
							'material', function ($subQuery) use ($search)
							{
								$subQuery
									->where('slug', $search)
									->where('status', config('constants.RULES.STATUS.ACTIVE'));
							}
						);
					}
					// executa o filtro pelo categoria
					if ($table === 'categoria') {
						$subQuery->whereHas(
							'category', function ($subQuery) use ($search)
							{
								$subQuery
									->where('slug', $search)
									->where('status', config('constants.RULES.STATUS.ACTIVE'));
							}
						);
					}
				}
			)
			->where('status', config('constants.RULES.STATUS.ACTIVE'));

		// executa o filtro pelo cor
		if ($table === 'tons') {
			self::$query->whereHas('tones', function ($subQuery) use ($search)
			{
				$subQuery->whereHas('colors', function ($subSubQuery) use ($search)
				{
					$subSubQuery
						->where('slug', $search)
						->where('status', config('constants.RULES.STATUS.ACTIVE'));
				});
			});
		}
		// executa o filtro pelo tema
		if ($table === 'tema') {
			self::$query->whereHas('themes', function ($subQuery) use ($search)
			{
				$subQuery
					->where('slug', $search)
					->where('status', config('constants.RULES.STATUS.ACTIVE'));
			});
		}

		// cria a paginacao
		self::pagination($table, $search);
		// formata os dados
		self::format();

		return [
			'type'     => $table,
			'current'  => $search,
			'data'     => self::$data,
			'title'    => BreadCrumbService::setTitle($table, $search),
			'paginate' => self::$paginate,
		];
	}

    /**
     * Handler paginator
	 *
	 * @param string $table
	 * @param string $search
     * @return void
     */
	public static function pagination($table, $search)
	{
		// recupera os dados paginados
		self::$data = self::$query->paginate(10);
		// adiciona parametro do filtro no paginate
		self::$data->appends([$table => $search]);
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
			if ($collection->launch == config('constants.RULES.LAUNCH.YES')) {
				$collection->launch = '<span class="pr_flash"><i class="fas fa-rocket launch"></i></span>';
			} else {
				$collection->launch = '';
			}
		});
	}

    /**
     * Retorna as informacoes importantes para renderizar os detalhes de um produto
	 *
	 * @param string $table
	 * @param string $search
	 * @param string $slug
	 * @param string $size
     * @return array
     */
	public static function productDetail($table, $search, $slug, $size = null)
	{
		// recupera os detalhes do item pelo codigo
		$item = tap(Item::where('slug', $slug)->firstOrFail(), function ($item)
			{
				// formata as cores do produto
				$tones = ToneService::format($item->tones);
				$item->tooltip    = $tones['tooltip'];
				$item->background = $tones['background'];
				// formata os temas do produto
				$item->allThemes = ThemeService::format($item->themes);
				// nacionalidade
				$item->nationality = ($item->national === config('constants.RULES.NATIONAL.YES')) ? 'Brasil' : 'Importado';
			});

		// recupera os tamanhos disponiveis do item
		$sizes = ProductSize::where('product_id', $item->product_id)
			->whereHas('items')
			->orderBy('size', 'DESC')
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
			->where('status', config('constants.RULES.STATUS.ACTIVE'))
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
			'current' => $search,
			'item'    => $item,
			'sizes'   => $sizes,
			'colors'  => $colors,
			'title'   => ['Detalhes do Produto'],
			'bread'   => BreadCrumbService::setTitle($table, $search),
		];
	}
}
