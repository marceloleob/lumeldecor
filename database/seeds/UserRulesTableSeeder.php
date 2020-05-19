<?php

use App\Models\UserRule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRulesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('user_rules')->delete();
		// cria os registros
		UserRule::create(['name' => 'Administrador(a)', 'status' => 1,]);
		UserRule::create(['name' => 'Vendedor(a)', 'status' => 1,]);
		UserRule::create(['name' => 'Fornecedor(a)', 'status' => 1,]);
		UserRule::create(['name' => 'Decorador(a)', 'status' => 1,]);
		UserRule::create(['name' => 'Cliente', 'status' => 1,]);
	}
}
