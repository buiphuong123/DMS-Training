<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use App\Models\Permissions;
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
        $kakaRole = Role::where('name','user1')->first();
        DB::table('permissions')->truncate();
        $mp = Permissions::where('name', 'manager dd')->first();
        $md = Permissions::where('name', 'deputy')->first();
        $mdd = Permissions::where('name', 'deputy department')->first();

         $admin = User::create([
             'username' => 'adminuser',
             'email' => 'admin@gmail.com',
             'password' => Hash::make('dddddddd'),
             'description' => 'admin',
             'permission_id' => 0,

         ]);
         $manager = User::create([
            'username' => 'manageruser',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('dddddddd'),
            'description' => 'manager',
            'permission_id' => 2
        ]);
        $user = User::create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('dddddddd'),
            'description' => 'user',
            'permission_id' => 2
        ]);

        $user1 = User::create([
            'username' => 'kaka',
            'email' => 'kaka@gmail.com',
            'password' => Hash::make('dddddddd'),
            'description' => 'kaka',
            'permission_id' => 2
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $user->roles()->attach($userRole);
        $user1->roles()->attach($kakaRole);

        $admin->permission()->associate($mp);
        $manager->permission()->associate($md);
        $user->permission()->associate($mdd);

        
    }
}
