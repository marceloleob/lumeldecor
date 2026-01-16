<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    public function run(): void
    {
        $methods = [
            [
                'name' => 'PAC',
                'code' => 'pac',
                'description' => 'Encomenda econômica dos Correios',
                'type' => 'correios',
                'base_cost' => 0,
                'estimated_days' => 10,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'SEDEX',
                'code' => 'sedex',
                'description' => 'Entrega expressa dos Correios',
                'type' => 'correios',
                'base_cost' => 0,
                'estimated_days' => 5,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Frete Grátis',
                'code' => 'frete-gratis',
                'description' => 'Frete grátis para compras acima de R$ 300',
                'type' => 'fixed',
                'base_cost' => 0,
                'estimated_days' => 7,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Retirar na Loja',
                'code' => 'retirada',
                'description' => 'Retirada gratuita na loja física',
                'type' => 'fixed',
                'base_cost' => 0,
                'estimated_days' => 2,
                'is_active' => true,
                'order' => 0,
            ],
        ];

        foreach ($methods as $method) {
            ShippingMethod::create($method);
        }

        $this->command->info('-> Métodos de envio criados com sucesso!');
    }
}
