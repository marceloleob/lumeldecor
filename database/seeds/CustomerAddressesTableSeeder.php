<?php

use App\Models\CustomerAddress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerAddressesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('customer_addresses')->delete();
		// cria os registros
		CustomerAddress::create([
			'customer_id'  => 1,      // Luana
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Senhora do Porto',
			'number'       => '1350',
			'complement'   => 'apto.: 407 B',
			'neighborhood' => 'Palmeiras',
			'zipcode'      => '30300-000',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
		CustomerAddress::create([
			'customer_id'  => 2,      // Paula
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Senhora do Porto',
			'number'       => '1350',
			'complement'   => 'apto.: 407 B',
			'neighborhood' => 'Palmeiras',
			'zipcode'      => '30300-000',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
	}
}
