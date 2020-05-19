<?php

use App\Models\CampaignItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('campaign_items')->delete();
		// cria os registros
		CampaignItem::create([
			'campaign_id' => 8,
			'item_id'     => 1
		]);
    }
}
