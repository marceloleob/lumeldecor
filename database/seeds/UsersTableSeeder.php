<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('users')->delete();
		// cria os registros
		User::create([
			'name'      => 'Marcelo Leopold',
			'email'     => 'marceloleob@gmail.com',
			'password'  => bcrypt('marcelo06'),
			'rule'      => 1,
			'status'    => 1,
		]);
		User::create([
			'name'      => 'Lílian Silveira',
			'email'     => 'contato@lumeldecor.com.br',
			'password'  => bcrypt('123456'),
			'rule'      => 1,
			'status'    => 1,
		]);
		User::create([
			'name'      => 'Ricardo Silveira',
			'email'     => 'ricardo@lumeldecor.com.br',
			'password'  => bcrypt('123456'),
			'rule'      => 1,
			'status'    => 1,
		]);
		User::create([
			'name'      => 'Paula Silveira Braga',
			'email'     => 'paulinhasb06@hotmail.com',
			'password'  => bcrypt('paulinha06'),
			'rule'      => 4,
			'status'    => 1,
		]);
    }
}
