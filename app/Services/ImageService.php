<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Exception;

class ImageService
{
	/**
	 * Verifica se vai salvar uma nova imagem ou atualizar uma atual
	 *
	 * @param string       $picture
	 * @param UploadedFile $newPicture
	 * @param integer      $itemId
	 * @return string $name
	 */
	public static function store($picture, $newPicture = null, $itemId = null)
	{
		// verifica se e para salvar ou atualizar a foto
		if (!empty($itemId)) {
			return self::update($picture, $newPicture);
		}

		return self::create($picture);
	}

	/**
	 * Salva a imagem no servidor
	 *
	 * @param UploadedFile $picture
	 * @return string $name
	 */
	public static function create($picture)
	{
		// cria um nome para a imagem
		$fileName = date('Y-m-d') . '-' . uniqid() . '.' . $picture->extension();
		// salva a imagem na pasta Regular
		$fullName = $picture->storeAS(config('constants.PICTURES_PATHS.REGULAR'), $fileName, 'public');
		// redimensiona as imagens (bigger, regular e thumbnail)
		self::resize($fullName, $fileName);

		return $fileName;
	}

	/**
	 * Atualiza a imagem no servidor
	 *
	 * @param string       $picture
	 * @param UploadedFile $newPicture
	 * @return string $name
	 */
	public static function update($picture, $newPicture)
	{
        // verifica se foi anexado uma nova imagem
        if (empty($newPicture)) {
            return $picture;
		}
		// exclui a imagem atual
		self::destroy($picture);
		// salva a nova imagem
		$fileName = self::create($newPicture);

		return $fileName;
	}

	/**
     * Exclui a imagem do servidor
     *
     * @param string $fileName
     * @return void
     */
    public static function destroy($fileName)
    {
		$pictureBigger    = config('constants.PICTURES_PATHS.BIGGER') . '/' . $fileName;
		$pictureRegular   = config('constants.PICTURES_PATHS.REGULAR') . '/' . $fileName;
		$pictureThumbnail = config('constants.PICTURES_PATHS.THUMBNAIL') . '/' . $fileName;
		// verifica se a imagem atual existe no servidor
		if (Storage::exists($pictureBigger) && Storage::exists($pictureRegular) && Storage::exists($pictureThumbnail)) {
			// exclui as imagens
			Storage::delete($pictureBigger);
			Storage::delete($pictureRegular);
			Storage::delete($pictureThumbnail);
		}
	}

	/**
	 * Redimensiona a imagem
	 *
	 * @param  string $fullName
	 * @param  string $fileName
	 * @return void
	 */
	public static function resize($fullName, $fileName)
	{
		// cria uma instancia da imagem
		$image = Image::make('storage/' . $fullName);

		// salva uma nova imagem com o tamanho correto (Bigger)
		$image->resize(810, 900, function ($constraint) {
			$constraint->aspectRatio();
		})->save('storage/' . config('constants.PICTURES_PATHS.BIGGER') . '/' . $fileName);

		// salva uma nova imagem com o tamanho correto (Regular)
		$image->resize(540, 600, function ($constraint) {
			$constraint->aspectRatio();
		})->save('storage/' . config('constants.PICTURES_PATHS.REGULAR') . '/' . $fileName);

		// salva uma nova imagem com o tamanho correto (Thumbnail)
		$image->resize(150, 160, function ($constraint) {
			$constraint->aspectRatio();
		})->save('storage/' . config('constants.PICTURES_PATHS.THUMBNAIL') . '/' . $fileName);
	}
}
