<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'store crud']);
        Permission::create(['name' => 'store detail']);
        Permission::create(['name' => 'admin crud']);
        Permission::create(['name' => 'product crud']);
        Permission::create(['name' => 'category crud']);
    }
}
