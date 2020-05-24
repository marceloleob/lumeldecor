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
			'user_id'   => 6,      // Luana
			'document'  => '251.844.352-55',
			'telephone' => null,
			'cellphone' => '(31) 99999-9999',
			'status'    => 1,
		]);
		Customer::create([
			'user_id'   => 7,      // Paula
			'document'  => '111.713.846-10',
			'telephone' => null,
			'cellphone' => '(31) 99999-9999',
			'status'    => 1,
		]);
	}
}
