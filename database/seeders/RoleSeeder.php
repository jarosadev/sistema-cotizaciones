<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['description' => 'admin']);
        Role::create(['description' => 'commercial']);
        Role::create(['description' => 'operator']);
        Role::create(['description' => 'customer']);
    }
}
