<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RulesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('rules')->delete();
		// cria os registros
		Rule::create(['name' => 'Administrador(a)', 'status' => 1,]);
		Rule::create(['name' => 'Vendedor(a)', 'status' => 1,]);
		Rule::create(['name' => 'Cliente', 'status' => 1,]);
	}
}
