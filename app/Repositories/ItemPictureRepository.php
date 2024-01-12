<?php

namespace App\Repositories;

use App\Models\ItemPicture;
use App\Services\ImageService;

class ItemPictureRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = ItemPicture::class;

	/**
	 * Manipula as imagens do item
	 *
	 * @param  integer $itemId
	 * @param  array   $pictures
	 * @param  array   $oldPictures
	 */
	public function handle($itemId, $pictures, $oldPictures)
	{
		foreach ($pictures as $key => $picture) {

			// salva ou atualiza uma foto no servidor
			$name = ImageService::store($picture, $oldPictures[$key]);

			if (!empty($oldPictures[$key])) {

				// atualiza uma foto existente
				$current = $this->findByName($oldPictures[$key]);
				$current->name = $name;
				$current->save();

			} else {

				// salva uma nova foto
				$this->store(['item_id' => $itemId, 'name' => $name]);
			}
		}
	}

	/**
	 * Exclui a imagem no servidor e no banco de dados
	 *
	 * @param  string $picture
	 * @return Item
	 */
	public function delete($picture)
	{
		$picture = $this->findByName($picture);
		// exclui as fotos (pequena, media e grande)
		ImageService::destroy($picture->name);
		// exclui no banco de dados
		$picture->delete();

		return $picture->item;
	}
}
