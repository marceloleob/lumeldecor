<?php

use App\Models\CampaignProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('campaign_products')->delete();
		// cria os registros
		CampaignProduct::create([
			'campaign_id' => 8,
			'product_id'  => 1
		]);
	}
}
