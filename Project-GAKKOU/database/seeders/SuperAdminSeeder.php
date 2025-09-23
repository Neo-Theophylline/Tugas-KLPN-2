<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@rizz.com'], // unik
            [
                'name'      => 'Admin Rizz',
                'password'  => Hash::make('rizz123'), // password default
                'is_active' => 'active',
            ]
        );
    }
}
