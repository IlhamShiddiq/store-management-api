<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'halosuperadmin',
            'email' => 'halosuperadmin@gmail.com',
            'password' => bcrypt('halosuperadmin'),
            'gender' => 'L',
            'address' => 'Unknown',
            'phone' => '1234567890'
        ]);

        $superadmin->assignRole('superadmin');
    }
}
