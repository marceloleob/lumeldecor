<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Criar roles
        $admin = Role::create(['name' => 'admin']);
        $seller = Role::create(['name' => 'seller']);
        $stockClerk = Role::create(['name' => 'stock clerk']);
        $client = Role::create(['name' => 'client']);

        // Criar permissões
        $permissions = [
            // Produtos
            'products.view',
            'products.create',
            'products.edit',
            'products.delete',

            // Pedidos
            'orders.view',
            'orders.edit',
            'orders.delete',

            // Estoque
            'inventory.view',
            'inventory.edit',

            // Cupons
            'coupons.view',
            'coupons.create',
            'coupons.edit',
            'coupons.delete',

            // Categorias
            'categories.view',
            'categories.create',
            'categories.edit',
            'categories.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Atribuir permissões
        $admin->givePermissionTo(Permission::all());
        $seller->givePermissionTo(['orders.view', 'orders.edit', 'products.view']);
        $stockClerk->givePermissionTo(['inventory.view', 'inventory.edit', 'products.view']);
    }
}
