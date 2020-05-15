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
			'material_id' => null,
			'category_id' => null,
			'theme_id'    => 12,
			'product_id'  => null,
			'name'        => 'Promoção de Natal!',
			'kind'        => 'P',
			'amount'      => '10',
			'start_day'   => '01',
			'start_month' => '12',
			'finish_day'   => '26',
			'finish_month' => '12',
			'status'      => 1
		]);
    }
}
