<?php

namespace App\Services;

class BaseService
{
    /**
     * Armazena uma colecao do banco
     *
     * @var Collection
     */
    public static $collection;

    /**
     * Armazena os dados da paginacao
     *
     * @var Paginator
     */
    public static $paginate;

    /**
     * Handler find first data
     *
     * @param Builder $query
     * @return void
     */
	public static function handleFirst($query)
	{
		// efetiva a busca no BD
        self::$collection = $query->first();
    }

    /**
     * Handler find all data
     *
     * @param Builder $query
     * @return void
     */
	public static function handleAll($query)
	{
		// efetiva a busca no BD
        self::$collection = $query->get();
    }

    /**
     * Handler find all data
     *
     * @param Builder $query
     * @return void
     */
	public static function handleAlltoArray($query)
	{
		// efetiva a busca no BD
        self::$collection = $query->get()->toArray();
    }

    /**
     * Handler paginator
     *
     * @param Builder $query
     * @return void
     */
	public static function handlePagination($query)
	{
		// efetiva a busca no BD obedecendo as regras da paginacao
        self::$collection = $data = $query->paginate(config('constants.TOTAL_PAGE'));
		// constroi os links da paginacao
		self::$paginate   = $data->links();
    }

	/**
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public static function customCollection()
	{
		// Percorre toda a Collection
		self::$collection->map(function ($array) {
			// verifica se e inativo
			if ($array->status == config('constants.ACTIVE')) {
                // seta ativo como default
                $array->status = ['class' => 'success', 'label' => 'Ativo'];
                $array->trash  = ['class' => 'btn-outline-danger', 'label' => 'fa-trash-alt'];
			} else {
                // seta inativo como default
				$array->status = ['class' => 'danger', 'label' => 'Inativo'];
				$array->trash  = ['class' => 'btn-outline-success', 'label' => 'fa-check'];
            }
		});
	}

	/**
	 * Retorna uma instancia do Servico solicitado
	 *
	 * @param string $model
	 * @return string
	 */
	public static function getService($model)
	{
		switch ($model) {
			case 'category':
				return CategoryService::class;
			case 'color':
				return ColorService::class;
			case 'customer':
				return CustomerService::class;
			case 'post':
				return PostService::class;
			case 'material':
				return MaterialService::class;
			case 'offer-coupon':
				return OfferCouponService::class;
			case 'offer-promotion':
				return OfferPromotionService::class;
			case 'order':
				return OrderService::class;
			case 'product':
				return ProductService::class;
			case 'stock':
				return StockService::class;
			case 'supplier':
				return SupplierService::class;
			case 'theme':
				return ThemeService::class;
			case 'user':
				return UserService::class;
			default:
				return false;
		}
	}
}
