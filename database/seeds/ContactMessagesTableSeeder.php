<?php

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMessagesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('contact_messages')->delete();
		// cria os registros
		ContactMessage::create([
			'name'    => 'Marcelo Leopold',
			'email'   => 'marceloleob@gmail.com',
			'phone'   => '(31) 98756-4062',
			'subject' => 'Teste dos contatos do Site',
			'text'    => 'Aqui fica o texto que o usuário do site mandar.'
		]);
	}
}
