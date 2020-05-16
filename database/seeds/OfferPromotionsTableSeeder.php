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
			'campaign_id' => null,
			'item_id'     => null,
			'product_id'  => null,
			'name'        => 'Promoção em todos os itens de Cerâmica do Site!',
			'kind'        => 'P',
			'amount'      => 10,
			'start_day'   => 1,
			'start_month' => 6,
			'finish_day'   => 31,
			'finish_month' => 6,
			'status'      => 1
		]);
	}
}
