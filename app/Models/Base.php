<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Base extends Model
{
	/**
	 * Gerencia os metodos SAVE e UPDATE de um Model
	 *
	 * @param array $data
	 * @return $this
	 */
	public static function store($data = [])
	{
		try {
			// verifica qual acao
			if (!empty($data['id'])) {
				// recupera a entidade
				$entity = self::find($data['id']);
				// realiza o update
				$entity->update($data);
				// retorna a entidade atualizada
				return $entity;
			} else {
				// realiza o save e retorna o objeto
				return self::create($data);
			}
		} catch (Exception $exception) {
			// retorna o erro
			throw new Exception($exception);
		}
	}
}
