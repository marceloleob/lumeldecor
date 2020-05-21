<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
	/**
	 *
	 * @return array
	 */
	public function all()
	{
		$category = Category::where('status', config('constants.ACTIVE'))
			->with(['material' => function ($subQuery) {
				$subQuery->orderBy('name');
			}])
			// ->with('material')
			// ->get();
			->map
			->format();

		$data = $category->paginate(10);
dd($data);
		// retorna a entidade com paginacao e busca (se existir)
		$params =[
			'data'     => $data,
			// 'search'   => $request->search,
			'paginate' => $data->links(),
		];

		return $params;
	}

	public function findById($categoryId)
	{
		return Category::where('id', $categoryId)
			->where('status', 1)
			->with('material')
			->firstOrFail()
			->format();
	}

	public function update($categoryId, $request)
	{
		$category = Category::where('id', $categoryId)->firstOrFail();

		$category->update($request);
	}

    /**
     * Handler paginator
     *
     * @param Builder $query
     * @return void
     */
	// public static function handlePagination($query)
	// {
	// 	// efetiva a busca no BD obedecendo as regras da paginacao
    //     self::$collection = $data = $query->paginate(config('constants.TOTAL_PAGE'));
    //     // constroi os links da paginacao
	//	self::$paginate = $data->links();
    //     // verifica se foi feito uma busca
    //     if (!empty(self::$search)) {
    //         // constroi os links da paginacao
    //         self::$paginate = $data->appends(['search' => self::$search])->links();
	// 	}

    //     // efetua o tratamento no collection
    //     static::customCollection();

	// 	// retorna a entidade com paginacao e busca (se existir)
	// 	return [
    //         'data'     => self::$collection,
    //         'search'   => self::$search,
	// 		'paginate' => self::$paginate,
	// 	];
    // }
}