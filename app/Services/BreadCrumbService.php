<?php

namespace App\Services;

class BreadCrumbService
{
	/**
	 * Recupera o nome correspondente da pagina de lista de produtos
	 *
	 * @param string $table
	 * @param string $search
	 * @return string
	 */
	public static function setTitle($table, $search)
	{
		if ($table === 'busca') {
			return ['Busca', strtoupper($search)];
		}
		if ($table === 'material') {
			return ['Material', MaterialService::getNameBySlug($search)];
		}
		if ($table === 'categoria') {
			return ['Categoria', CategoryService::getNameBySlug($search)];
		}
		if ($table === 'tons') {
			return ['Cor', ColorService::getNameBySlug($search)];
		}
		if ($table === 'tema') {
			return ['Tema', ThemeService::getNameBySlug($search)];
		}
	}
}
