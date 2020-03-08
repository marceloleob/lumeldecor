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
		DB::table('users')->delete();
		// cria os registros
		UserRule::create(['name' => 'Administrador', 'status' => 1,]);
		UserRule::create(['name' => 'Vendedor', 'status' => 1,]);
		UserRule::create(['name' => 'Fornecedor', 'status' => 1,]);
		UserRule::create(['name' => 'Decorador', 'status' => 1,]);
		UserRule::create(['name' => 'Cliente', 'status' => 1,]);
    }
}
