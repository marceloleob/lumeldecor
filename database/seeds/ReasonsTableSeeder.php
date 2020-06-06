<?php

use App\Models\Reason;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('reasons')->delete();
		// cria os registros de Entradas
		Reason::create(['action' => 'I', 'name' => 'Item comprado no Fornecedor']);
		Reason::create(['action' => 'I', 'name' => 'Compra foi cancelada']);
		Reason::create(['action' => 'I', 'name' => 'Item devolvido na Loja']);
		// cria os registros de Saidas
		Reason::create(['action' => 'O', 'name' => 'Venda na Loja']);
		Reason::create(['action' => 'O', 'name' => 'Venda no Site']);
		Reason::create(['action' => 'O', 'name' => 'Venda no Instagram']);
		Reason::create(['action' => 'O', 'name' => 'Venda no FaceBook']);
		Reason::create(['action' => 'O', 'name' => 'Item quebrado e devolvido para o Fornecedor']);
    }
}
