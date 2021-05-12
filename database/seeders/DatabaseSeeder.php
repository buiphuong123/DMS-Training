<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\timesheet::factory(4)->create();
        // $this -> call('Database\Seeders\SheetTableSeeder');
        $this -> call('Database\Seeders\RolesTableSeeder'::class); 
        $this -> call('Database\Seeders\UserTableSeeder'::class); 
        $this -> call('Database\Seeders\PermissionTableSeeder'::class); 
    }
}
