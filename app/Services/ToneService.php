<?php

namespace App\Services;

class ToneService
{
	/**
	 * Recupera as cores e retorna formatado para CSS/HTML
	 *
	 * @param \App\Models\Tone
	 * @return array
	 */
	public static function format($tones)
	{
		$count  = count($tones);

		if ($count === 1) {
			$tooltip    = $tones[0]->name;
			$background = 'background-color: ' . $tones[0]->hexa . ';';
		}
		if ($count === 2) {
			$tooltip    = $tones[0]->name . ' e ' . $tones[1]->name;
			$background = 'background: linear-gradient( to right, ' . $tones[0]->hexa . ', ' . $tones[0]->hexa . ' 50%, ' . $tones[1]->hexa . ' 50% );';
		}
		if ($count === 3) {
			$tooltip    = $tones[0]->name . ', ' . $tones[1]->name . ' e ' . $tones[2]->name;
			$background = 'background: linear-gradient( to right, ' . $tones[0]->hexa . ', ' . $tones[0]->hexa . ' 32%, ' . $tones[1]->hexa . ' 32%, ' . $tones[1]->hexa . ' 67%, ' . $tones[2]->hexa . ' 67% );';
		}

		return [
			'tooltip'    => $tooltip,
			'background' => $background,
		];
	}
}
