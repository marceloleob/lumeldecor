<?php

use App\Models\Tone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('tones')->delete();
		// cria os registros de Entradas
		Tone::create(['name' => 'Azul', 'status' => 1]);
		Tone::create(['name' => 'Verde', 'status' => 1]);
		Tone::create(['name' => 'Amarelo', 'status' => 1]);
		Tone::create(['name' => 'Vermelho', 'status' => 1]);
		Tone::create(['name' => 'Rosa', 'status' => 1]);
		Tone::create(['name' => 'Metálico', 'status' => 1]);
		Tone::create(['name' => 'Neon', 'status' => 1]);
    }
}
