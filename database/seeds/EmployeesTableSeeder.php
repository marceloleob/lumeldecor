<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('employees')->delete();
		// cria os registros
		Employee::create([
			'user_id'   => 4,      // Melissa
			'document'  => '779.595.850-83',
			'telephone' => null,
			'cellphone' => '(31) 99999-9999',
			'status'    => 1,
		]);
	}
}
