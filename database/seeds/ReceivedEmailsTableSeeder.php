<?php

use App\Models\ReceivedEmail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReceivedEmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('received_emails')->delete();
    }
}
