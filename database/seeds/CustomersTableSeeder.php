<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('customers')->delete();
		// cria os registros
		Customer::create([
			'user_id'      => 4,      // Paula
			'city_id'      => 1403,   // Belo Horizonte
			'document'     => '111.713.846-10',
			'telephone'    => '',
			'cellphone'    => '(31) 99999-9999',
			'address'      => 'Rua Senhora do Porto',
			'number'       => '1350',
			'comp'         => 'apto.: 407 B',
			'neighborhood' => 'Palmeiras',
			'zipcode'      => '30300-000',
			'status'       => 1,
		]);
    }
}
