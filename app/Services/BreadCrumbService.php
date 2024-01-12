<?php

namespace App\Services;

class BreadCrumbService
{
	/**
	 * Recupera o nome correspondente da pagina de lista de produtos
	 *
	 * @return array
	 */
	public static function setTitle()
	{
		switch (session('module')) {

			case 'busca' :
				return ['Busca', strtoupper(session('search'))];
			case 'material' :
				return ['Material', MaterialService::getNameBySlug(session('search'))];
			case 'categoria' :
				return ['Categoria', CategoryService::getNameBySlug(session('search'))];
			case 'tons' :
				return ['Cor', ColorService::getNameBySlug(session('search'))];
			case 'tema' :
				return ['Tema', ThemeService::getNameBySlug(session('search'))];
			default :
				return '';
		}
	}
}
