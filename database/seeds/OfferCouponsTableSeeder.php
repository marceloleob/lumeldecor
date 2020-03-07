<?php

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
			'name'       => 'Cupom de Teste',
			'code'       => 'TESTE123',
			'start_date' => '03-01-2020',
			'finish_date' => '03-31-2020',
			'status'     => 1
		]);
    }
}
