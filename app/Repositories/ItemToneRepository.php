<?php

namespace App\Repositories;

use App\Models\ItemTone;

class ItemToneRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = ItemTone::class;

	/**
	 * Manipula a criacao de tonalidades do item
	 *
	 * @param  integer $itemId
	 * @param  Tone    $tones
	 */
	public function handle($itemId, $tones)
	{
		// exclui todas as tonalidades deste item
		$this->delete($itemId);
		// salva todas as tonalidades postadas
		$this->create($itemId, $tones);
	}

	/**
	 * Salva as tonalidades do item
	 *
	 * @param  integer $itemId
	 * @param  Tone    $tones
	 */
	public function create($itemId, $tones)
	{
		foreach ($tones as $toneId) {
			$data = [
				'item_id' => $itemId,
				'tone_id' => (int) $toneId,
			];

			$this->store($data);
		}
	}

	/**
	 * Exclui todas as tonalidades do item
	 *
	 * @param  integer $itemId
	 */
	public function delete($itemId)
	{
		$this->query()->where('item_id', $itemId)->delete();
	}
}
