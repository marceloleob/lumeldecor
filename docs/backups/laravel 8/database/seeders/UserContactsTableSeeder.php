<?php

namespace Database\Seeders;

use App\Models\UserContact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('user_contacts')->delete();
		// cria os registros
		UserContact::create(['user_id' => 1, 'document' => '146.830.518-26', 'telephone' => null, 'cellphone' => '(31) 98756-4062', 'status' => 1]); // Marcelo
		UserContact::create(['user_id' => 2, 'document' => '257.486.042-05', 'telephone' => null, 'cellphone' => '(31) 99914-1555', 'status' => 1]); // Ricardo
		UserContact::create(['user_id' => 3, 'document' => '284.145.468-11', 'telephone' => null, 'cellphone' => '(31) 99514-0615', 'status' => 1]); // Lilian
		UserContact::create(['user_id' => 4, 'document' => '929.569.804-59', 'telephone' => null, 'cellphone' => '(31) 99999-9999', 'status' => 1]); // Melissa
		UserContact::create(['user_id' => 5, 'document' => '684.489.614-04', 'telephone' => null, 'cellphone' => '(31) 98888-8888', 'status' => 1]); // Luana
		UserContact::create(['user_id' => 6, 'document' => '911.236.046-57', 'telephone' => null, 'cellphone' => '(31) 97160-4093', 'status' => 1]); // Lucy
		UserContact::create(['user_id' => 7, 'document' => '251.844.352-55', 'telephone' => null, 'cellphone' => '(31) 97777-7777', 'status' => 1]); // Paula
    }
}
