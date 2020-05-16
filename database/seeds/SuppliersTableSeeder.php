<?php

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('suppliers')->delete();
		// cria os registros
		Supplier::create([
			'city_id'      => 1403,
			'code'         => 'ABCDE',
			'kind'         => 'J',
			'document'     => '55778781000131',
			'company'      => 'Fornecedor Teste',
			'phone'        => '1133333333',
			'email'        => 'lucy@fornecedorteste.com.br',
			'address'      => 'Rua Teste',
			'number'       => '99',
			'comp'         => 'galpão',
			'neighborhood' => 'Bairro Teste',
			'zipcode'      => '30330000',
			'website'      => 'www.fornecedorteste.com.br',
			'status'       => 1,
		]);
	}
}
