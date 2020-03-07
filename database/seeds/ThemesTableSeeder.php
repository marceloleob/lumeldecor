<?php

use App\Models\Theme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('themes')->delete();
		// cria os registros
		Theme::create(['name' => 'Carnaval', 'start_day' => '1', 'start_month' => '1', 'finish_day' => '25', 'finish_month' => '2', 'status' => 1]);
		Theme::create(['name' => 'Dia da Mulher', 'start_day' => '15', 'start_month' => '2', 'finish_day' => '8', 'finish_month' => '3', 'status' => 1]);
		Theme::create(['name' => 'Páscoa', 'start_day' => '1', 'start_month' => '3', 'finish_day' => '15', 'finish_month' => '4', 'status' => 1]);
		Theme::create(['name' => 'Paixão de Cristo', 'start_day' => '1', 'start_month' => '3', 'finish_day' => '15', 'finish_month' => '4', 'status' => 1]);
		Theme::create(['name' => 'Dia das Mães', 'start_day' => '1', 'start_month' => '4', 'finish_day' => '15', 'finish_month' => '5', 'status' => 1]);
		Theme::create(['name' => 'Dia dos Namorados', 'start_day' => '1', 'start_month' => '5', 'finish_day' => '12', 'finish_month' => '6', 'status' => 1]);
		Theme::create(['name' => 'Dia de São João', 'start_day' => '15', 'start_month' => '5', 'finish_day' => '24', 'finish_month' => '6', 'status' => 1]);
		Theme::create(['name' => 'Dia dos Pais', 'start_day' => '15', 'start_month' => '7', 'finish_day' => '10', 'finish_month' => '8', 'status' => 1]);
		Theme::create(['name' => 'Independência do Brasil', 'start_day' => '15', 'start_month' => '8', 'finish_day' => '8', 'finish_month' => '9', 'status' => 1]);
		Theme::create(['name' => 'Dia das Crianças', 'start_day' => '10', 'start_month' => '9', 'finish_day' => '13', 'finish_month' => '10', 'status' => 1]);
		Theme::create(['name' => 'Finados', 'start_day' => '20', 'start_month' => '10', 'finish_day' => '3', 'finish_month' => '11', 'status' => 1]);
		Theme::create(['name' => 'Natal', 'start_day' => '1', 'start_month' => '12', 'finish_day' => '26', 'finish_month' => '12', 'status' => 1]);
    }
}