<?php

namespace App\Repositories;

use App\Models\ItemTheme;

class ItemThemeRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = ItemTheme::class;

	/**
	 * Manipula a criacao de temas do item
	 *
	 * @param  integer $itemId
	 * @param  Theme   $themes
	 */
	public function handle($itemId, $themes)
	{
		// exclui todos os temas deste item
		$this->delete($itemId);
		// salva todos os temas postados
		$this->create($itemId, $themes);
	}

	/**
	 * Salva os temas do item
	 *
	 * @param  integer $itemId
	 * @param  Theme   $themes
	 */
	public function create($itemId, $themes)
	{
		foreach ($themes as $themeId) {
			$data = [
				'item_id'  => $itemId,
				'theme_id' => (int) $themeId,
			];

			$this->store($data);
		}
	}

	/**
	 * Exclui todos os temas do item
	 *
	 * @param  integer $itemId
	 */
	public function delete($itemId)
	{
		$this->query()->where('item_id', $itemId)->delete();
	}
}
