<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder Super Admin
        $this->call(\Database\Seeders\SuperAdminSeeder::class);
    }
}
