<?php

namespace Database\Seeders;

use App\Models\SupplierContact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('supplier_contacts')->delete();
		// cria os registros
		SupplierContact::create([
			'supplier_id' => 1,
			'name'        => 'Alguém Blabla',
			'email'       => 'lucy@fornecedorteste.com.br',
			'telephone'   => '(11) 3333-3333',
			'cellphone'   => '(11) 99999-9999',
			'position'    => 'Gerente',
		]);
    }
}
