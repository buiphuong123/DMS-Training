<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::truncate();
        Permissions::create(['name' => 'manager dd']);
        Permissions::create(['name' => 'deputy']);
        Permissions::create(['name' => 'deputy department']);
        
    }
}
