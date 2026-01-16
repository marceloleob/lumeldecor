<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Resetar cache de permissões
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ========================================
        // PERMISSÕES
        // ========================================

        $permissions = [
            // Produtos
            'products.view',
            'products.create',
            'products.edit',
            'products.delete',

            // Categorias
            'categories.view',
            'categories.create',
            'categories.edit',
            'categories.delete',

            // Materiais
            'materials.view',
            'materials.create',
            'materials.edit',
            'materials.delete',

            // Pedidos
            'orders.view',
            'orders.edit',
            'orders.delete',
            'orders.export',

            // Estoque
            'inventory.view',
            'inventory.edit',

            // Cupons
            'coupons.view',
            'coupons.create',
            'coupons.edit',
            'coupons.delete',

            // Coleções
            'collections.view',
            'collections.create',
            'collections.edit',
            'collections.delete',

            // Clientes
            'customers.view',
            'customers.create',
            'customers.edit',
            'customers.delete',

            // Kits/Bundles
            'bundles.view',
            'bundles.create',
            'bundles.edit',
            'bundles.delete',

            // Configurações
            'settings.view',
            'settings.edit',

            // Relatórios
            'reports.view',
            'reports.export',

            // Usuários
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ========================================
        // ROLES
        // ========================================

        // 1. ADMIN (pode tudo)
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        // 2. VENDEDOR (pedidos + produtos visualização)
        $seller = Role::create(['name' => 'vendedor']);
        $seller->givePermissionTo([
            'orders.view',
            'orders.edit',
            'products.view',
            'categories.view',
            'materials.view',
            'inventory.view',
            'customers.view',
        ]);

        // 3. ESTOQUISTA (estoque + produtos)
        $stockClerk = Role::create(['name' => 'estoquista']);
        $stockClerk->givePermissionTo([
            'inventory.view',
            'inventory.edit',
            'products.view',
            'products.edit',
            'categories.view',
            'materials.view',
        ]);

        // 4. CLIENTE (nenhuma permissão no admin)
        Role::create(['name' => 'cliente']);

        $this->command->info('-> Roles e Permissões criadas com sucesso!');
    }
}
