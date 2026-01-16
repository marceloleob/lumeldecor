<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            MaterialSeeder::class,
            CategorySeeder::class,
            ShippingMethodSeeder::class,
            ProductSeeder::class,
            BundleSeeder::class,
            CollectionSeeder::class,
        ]);

        $this->command->info('');
        $this->command->info('🎉 Seeders executados com sucesso!');
        $this->command->info('');
    }
}
