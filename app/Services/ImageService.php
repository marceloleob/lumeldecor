<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\File as SymfonyFile;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Exception;

class ImageService
{
	/**
	 * Faz o Upload da imagem utilizando o framework
	 *
	 * @param UploadedFile
	 * @return string $name
	 */
	public static function move($image)
	{
		// recupera os dados da foto
		$ext  = strtolower($image->getClientOriginalExtension());
		$name = config('constants.PICTURES_PATH') . substr(md5($image->getClientOriginalName()), 0, 12) . time('His') . '.' . $ext;

		// grava o arquivo fisico
		$send = $image->move('images/' . config('constants.PICTURES_PATH'), $name);

		// verifica se salvou a imagem em disco
		if (!$send instanceof SymfonyFile) {
			throw new Exception('Erro ao salvar a imagem, por favor tente novamente.', 1);
		}

		return $name;
	}

	/**
	 * Adiciona uma marca d`agua na imagem
	 *
	 * @param string $name
	 * @return void
	 */
	public static function waterMark($name)
	{
		// cria uma instancia da foto para manipular
		$photo = Image::make('images/' . $name);
		// cria uma instancia da estampa
		$watermark = Image::make('images/stamp.png');
		// insere a estampa na foto
		$photo->insert($watermark, 'center');
	}

	/**
	 * Redimensiona o tamanho original da imagem
	 *
	 * @param  string $name
	 * @return string $position
	 */
	public static function resize($name)
	{
		// cria uma instancia da foto para manipular
		$photo = Image::make('images/' . $name);
		// recupera as dimensoes
		list($width, $height) = @getimagesize('images/' . $name);
		// calcula o novo tamanho fixando a altura em 800px
		$newHeight = config('constants.PICTURES_MAX_HEIGHT');
		$newWidth  = ($newHeight * $width) / $height;
		// executa o redimensionamento
		$photo->resize($newWidth, $newHeight)->save('images/' . $name);
		// orientacao da imagem
		$position = 'H';
		// verifica se a foto e H ou V
		if ($width < $height) {
			$position = 'V';
		}

		return $position;
	}

	/**
	 * Salva a imagem no servidor
	 *
	 * @param UploadedFile @image
	 * @return string $name
	 */
	public static function save($image)
	{
        // verifica se e uma imagem
        if ($image->isValid() === false) {
            throw new Exception('Você deve anexar uma imagem válida!', 1);
		}

		try {
			// faz o upload da imagem
			$name = self::move($image);
			// adiciona uma marca d`agua
			// self::waterMark($name);
			// redimensiona a imagem original
			// self::resize($name);

			return $name;

		} catch (NotReadableException $exception) {
			throw new Exception('Erro ao localizar a imagem no servidor, por favor tente novamente!', $exception);
		}
	}

	/**
     * Exclui a imagem do servidor
     *
     * @param string $image
     * @return void
     */
    public static function destroy($image)
    {
        // verifica se a imagem existe
        if (Storage::exists($image) === false) {
            throw new Exception('A foto não foi encontrada no servidor, por favor tente novamente', 1);
        }
        // exclui a imagem
        return Storage::delete($image);
    }
}
