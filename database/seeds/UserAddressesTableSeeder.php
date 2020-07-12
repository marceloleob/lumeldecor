<?php

use App\Models\UserAddress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('user_addresses')->delete();
		// cria os registros
		UserAddress::create([
			'user_id'      => 1,      // Marcelo
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Amparo',
			'number'       => '274',
			'complement'   => 'apto.: 701',
			'neighborhood' => 'Alto Barroca',
			'zipcode'      => '30431-008',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
		UserAddress::create([
			'user_id'      => 2,      // Ricardo
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Úrsula Paulino',
			'number'       => '911',
			'complement'   => 'loja',
			'neighborhood' => 'Betânia',
			'zipcode'      => '30570-000',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
		UserAddress::create([
			'user_id'      => 3,      // Lilian
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Úrsula Paulino',
			'number'       => '911',
			'complement'   => 'loja',
			'neighborhood' => 'Betânia',
			'zipcode'      => '30570-000',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
		UserAddress::create([
			'user_id'      => 4,      // Melissa
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Úrsula Paulino',
			'number'       => '911',
			'complement'   => 'loja',
			'neighborhood' => 'Betânia',
			'zipcode'      => '30570-000',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
		UserAddress::create([
			'user_id'      => 5,      // Luana
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Úrsula Paulino',
			'number'       => '911',
			'complement'   => 'loja',
			'neighborhood' => 'Betânia',
			'zipcode'      => '30570-000',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
		UserAddress::create([
			'user_id'      => 6,      // Lucy
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Ibiraci',
			'number'       => '57',
			'complement'   => '',
			'neighborhood' => 'Salgado Filho',
			'zipcode'      => '30550-350',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
		UserAddress::create([
			'user_id'      => 7,      // Paula
			'city_id'      => 1403,   // Belo Horizonte
			'address'      => 'Rua Senhora do Porto',
			'number'       => '1350',
			'complement'   => 'apto.: 407 B',
			'neighborhood' => 'Palmeiras',
			'zipcode'      => '30300-000',
			'delivery'     => 1,
			'billing'      => 1,
			'status'       => 1,
		]);
    }
}
