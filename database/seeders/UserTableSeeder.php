<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name','admin')->first();
        $managerRole = Role::where('name','manager')->first();
        $userRole = Role::where('name','user')->first();
         $admin = User::create([
             'username' => 'adminuser',
             'email' => 'admin@gmail.com',
             'password' => Hash::make('dddddddd'),
             'description' => 'admin'
         ]);
         $manager = User::create([
            'username' => 'manageruser',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('dddddddd'),
            'description' => 'manager'
        ]);
        $user = User::create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('dddddddd'),
            'description' => 'user'
        ]);
        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $user->roles()->attach($userRole);
    }
}
