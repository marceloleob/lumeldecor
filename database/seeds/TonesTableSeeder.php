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
		// Tone::create(['name' => 'Azul', 'status' => 1]);
		// Tone::create(['name' => 'Verde', 'status' => 1]);
		// Tone::create(['name' => 'Amarelo', 'status' => 1]);
		// Tone::create(['name' => 'Vermelho', 'status' => 1]);
		// Tone::create(['name' => 'Rosa', 'status' => 1]);
		// Tone::create(['name' => 'Metálico', 'status' => 1]);
		// Tone::create(['name' => 'Neon', 'status' => 1]);

		Tone::create(['name' => 'Pink Colors', 'status' => 1]);
		Tone::create(['name' => 'Purple Colors', 'status' => 1]);
		Tone::create(['name' => 'Red Colors', 'status' => 1]);
		Tone::create(['name' => 'Orange Colors', 'status' => 1]);
		Tone::create(['name' => 'Yellow Colors', 'status' => 1]);
		Tone::create(['name' => 'Green Colors', 'status' => 1]);
		Tone::create(['name' => 'Cyan Colors', 'status' => 1]);
		Tone::create(['name' => 'Blue Colors', 'status' => 1]);
		Tone::create(['name' => 'Brown Colors', 'status' => 1]);
		Tone::create(['name' => 'White Colors', 'status' => 1]);
		Tone::create(['name' => 'Grey Colors', 'status' => 1]);

    }
}
