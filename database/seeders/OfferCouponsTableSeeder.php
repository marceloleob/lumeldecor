<?php

namespace Database\Seeders;

use App\Models\OfferCoupon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferCouponsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('offer_coupons')->delete();
		// cria os registros
		OfferCoupon::create([
			'name'        => 'Cupom de Teste',
			'code'        => 'TESTE123',
			'kind'        => 'P',
			'amount'      => 12.89,
			'start_date'  => '2020-05-01',
			'finish_date' => '2020-05-31',
			'status'      => 1
		]);
	}
}
