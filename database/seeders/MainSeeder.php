<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsSeeder::class,
            RolesSeeder::class,
            UserSeeder::class,
        ]);

        $superadmin = Role::findByName('superadmin');
        $admin = Role::findByName('admin');

        $superadmin->syncPermissions(['store crud', 'admin crud', 'product crud', 'category crud']);
        $admin->syncPermissions(['product crud', 'category crud']);
    }
}
