<?php

use App\Models\OfferPromotion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferPromotionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('offer_promotions')->delete();
		// cria os registros
		OfferPromotion::create([
			'material_id' => 2,
			'category_id' => null,
			'theme_id'    => null,
			'product_id'  => null,
			'item_id'     => null,
			'name'        => 'Promoção em todos os itens de Cerâmica do Site!',
			'kind'        => 'V',
			'amount'      => 25.50,
			'start_date'  => '2020-05-01',
			'finish_date' => '2020-05-31',
			'status'      => 1
		]);
	}
}
