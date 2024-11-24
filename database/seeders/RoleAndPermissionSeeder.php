<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Role::exists()) {
            Role::create(['name' => 'Super Admin']);
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'customer']);
            Role::create(['name' => 'expert']);
        }
    }
}
