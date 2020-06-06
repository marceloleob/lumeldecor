<?php

namespace App\Services;

class ColorService
{
	/**
	 * Recupera as imagens do Item e retorna com formatado para CSS/HTML
	 *
	 * @param \App\Models\Color
	 * @return array
	 */
	public static function format($colors)
	{
		$count  = count($colors);

		if ($count === 1) {
			$tooltip    = $colors[0]->name;
			$background = 'background-color: ' . $colors[0]->hexa . ';';
		}
		if ($count === 2) {
			$tooltip    = $colors[0]->name . ' e ' . $colors[1]->name;
			$background = 'background: linear-gradient( to right, ' . $colors[0]->hexa . ', ' . $colors[0]->hexa . ' 50%, ' . $colors[1]->hexa . ' 50% );';
		}
		if ($count === 3) {
			$tooltip    = $colors[0]->name . ', ' . $colors[1]->name . ' e ' . $colors[2]->name;
			$background = 'background: linear-gradient( to right, ' . $colors[0]->hexa . ', ' . $colors[0]->hexa . ' 32%, ' . $colors[1]->hexa . ' 32%, ' . $colors[1]->hexa . ' 67%, ' . $colors[2]->hexa . ' 67% );';
		}

		return [
			'tooltip'    => $tooltip,
			'background' => $background,
		];
	}
}
