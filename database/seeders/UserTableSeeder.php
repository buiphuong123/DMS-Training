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
        $authorRole = Role::where('name','author')->first();
        $userRole = Role::where('name','user')->first();
         $admin = User::create([
             'username' => 'adminuser',
             'email' => 'admin@gmail.com',
             'password' => Hash::make('dddddddd'),
             'description' => 'admin'
         ]);
         $author = User::create([
            'username' => 'authoruser',
            'email' => 'author@gmail.com',
            'password' => Hash::make('dddddddd'),
            'description' => 'author'
        ]);
        $user = User::create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('dddddddd'),
            'description' => 'user'
        ]);
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
