<?php

use App\Models\Email;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('emails')->delete();
    }
}
