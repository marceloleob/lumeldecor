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
			'kind'        => 'P',
			'value'       => '10',
			'start_date'  => '2020-03-01',
			'finish_date'  => '2020-03-31',
			'status'      => 1
		]);
    }
}
