<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use DOMDocument;
use DOMElement;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ColorsController extends Controller
{
	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$url = 'https://www.w3schools.com/colors/colors_groups.asp';
		$client = new Client([
			'base_uri' => $url
		]);

        $client = new Client();
        $response = $client->request('GET', $url);

		$body = $response->getBody();
		$bodyString =  (string) $body;

		$domDoc = new DOMDocument();
		// The @ in front of $domDoc will suppress any warnings
		$domHtml = @$domDoc->loadHTML($body);
		//discard white space
		$domDoc->preserveWhiteSpace = false;

		// $contents = $body->getContents();


		//get all rows from the table
		$tables = $domDoc->getElementsByTagName('table');
		// dd($table);
		// $rows = $table->getElementsByTagName('tr');

		// loop over the table rows
		foreach ($tables as $table)
		{
			$rows = $table->getElementsByTagName('tr');

			$tone_id = 0;
			foreach ($rows as $row)
			{
				$columns = $row->getElementsByTagName('td');

				// verifica se nesta TR existe TD
				if ($columns->length > 0) {

					// recupera o nome da tonalidade
					if ($columns->item(0)->hasAttributes()) {
						$tone_id++;
						$tone = $columns->item(0)->nodeValue;
						echo "Tone::create(['name' => '" . $tone . "', 'status' => 1]); <br />";
						// pula para a proxima TR
						continue;
					}

					$color = $columns->item(0)->nodeValue;
					$hexa  = $columns->item(1)->nodeValue;
					echo "Color::create(['tone_id' => " . $tone_id . ", 'name' => '" . $color . "', 'hexa' => '" . $hexa . "', 'status' => 1]); <br />";
				}
			}
		}

dd('fim');

		return view('site.pages.colors');
	}
}
