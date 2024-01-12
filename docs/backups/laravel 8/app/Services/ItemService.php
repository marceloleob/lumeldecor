<?php

namespace App\Services;

use App\Repositories\ItemPictureRepository;
use App\Repositories\ItemRepository;
use App\Repositories\ItemThemeRepository;
use App\Repositories\ItemToneRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductSizeRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;

class ItemService
{
	/**
	 * Gerencia o metodo create e update dos itens do produto
	 *
	 * @param  array   $data
	 * @param  integer $itemId
	 * @return \App\Models\Item
	 */
    public static function store($data = [], $itemId = null)
    {
		// recupera uma instancia do produto pai
		$product = (new ProductRepository)->findById($data['product_id']);
		// recupera uma instancia do tamanho do produto pai
		$productSize = (new ProductSizeRepository)->findById($data['product_size_id']);

		// atualiza os dados do Item
		$data['slug'] = self::slug($product, $productSize, $data['tones']);
		$data['sku']  = SkuService::generate($product, $productSize, $data['tones']);

		// inicia o acoplamento de uma transacao
		DB::beginTransaction();

        try {
			// salva ou atualiza os dados
			$item = (new ItemRepository)->store($data);

			// verifica se salvou
			if (false === isset($item->id)) {
				throw new Exception('Erro ao salvar o item.', 1);
			}

			// vincula as tonalidades ao item
			(new ItemToneRepository)->handle($item->id, $data['tones']);
			// vincula os temas ao item
			(new ItemThemeRepository)->handle($item->id, $data['themes'] ?? null);
			// vincula as fotos ao item
			(new ItemPictureRepository)->handle($item->id, $data['pictures'], $data['old_pictures'] ?? null);

			if (empty($itemId)) {
				// vincula o estoque ao item
				StockService::new($item->id, $data['product_id'], $data['amount']);
			}

			// atualiza o produto para (cadastro completo)
			$product->done = config('constants.RULES.DONE.YES');
			$product->save();

			// efetiva a transacao
			DB::commit();

			return $item;

		} catch (Exception $exception) {
			// descarta a transacao
			DB::rollback();

			return [
				'message'   => 'Erro ao ' . (empty($data['id']) ? 'cadastrar' : 'atualizar') . ', tente novamente!',
				'exception' => $exception->getMessage(),
			];
		}
	}

	/**
	 * Cria um SLUG unico para o item
	 *
	 * @param Product     $product
	 * @param ProductSize $product
	 * @param Tone        $tones
	 * @return string
	 */
	public static function slug($product, $productSize, $tones)
	{
		// recupera os nomes das tonalidades
		$tones = ToneService::namesByIds($tones);

		return Str::slug($product->name . ' ' . $productSize->size . ' ' . implode(' e ', $tones));
	}

	/**
	 * Formata o total de lucro que pode ter no item
	 *
	 * @param Collection $collection
	 * @return string
	 */
	public static function profit($collection)
	{
		$class  = 'success';

		$gross  = ($collection->s_price - $collection->p_price);
		$profit = (($gross * 100) / $collection->p_price);

		// verifica se o lucro foi bom ou ruim
		if ($profit <= 10) {
			$class = 'danger';
		}
		if ($profit > 10 && $profit < 100) {
			$class = 'warning';
		}

		return '<span class="text-' . $class . '">' . number_format($profit, 2, ',', '.') . '% de lucro</span>';
	}
}
