<?php

use App\Models\Newsletter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('newsletters')->delete();
    }
}
