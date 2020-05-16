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
			'user_rule_id' => 1,
			'name'         => 'Marcelo Leopold',
			'email'        => 'marceloleob@gmail.com',
			'password'     => bcrypt('marcelo06'),
			'status'       => 1,
		]);
		User::create([
			'user_rule_id' => 1,
			'name'         => 'Lílian Silveira',
			'email'        => 'lilian@lumeldecor.com.br',
			'password'     => bcrypt('123456'),
			'status'       => 1,
		]);
		User::create([
			'user_rule_id' => 1,
			'name'         => 'Ricardo Silveira',
			'email'        => 'ricardo@lumeldecor.com.br',
			'password'     => bcrypt('123456'),
			'status'       => 1,
		]);
		User::create([
			'user_rule_id' => 2,
			'name'         => 'Melissa de Souza Silveira',
			'email'        => 'melissa@decoradora.com.br',
			'password'     => bcrypt('123456'),
			'status'       => 1,
		]);
		User::create([
			'user_rule_id' => 3,
			'name'         => 'Lucy Silveira Braga',
			'email'        => 'lucy@fornecedorteste.com.br',
			'password'     => bcrypt('123456'),
			'status'       => 1,
		]);
		User::create([
			'user_rule_id' => 4,
			'name'         => 'Luana de Souza Silveira',
			'email'        => 'luana@decoradora.com.br',
			'password'     => bcrypt('123456'),
			'status'       => 1,
		]);
		User::create([
			'user_rule_id' => 5,
			'name'         => 'Paula Silveira Braga',
			'email'        => 'paulinhasb06@hotmail.com',
			'password'     => bcrypt('123456'),
			'status'       => 1,
		]);
    }
}
