<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0;$i < 200;$i++){
            $user=new User();
            $user->username='nguoi '.$i;
            $user->email='akk '.$i . '@gmail.com';
            $user->password='akkkkkkk' . $i;
            $user->description='chan qua' . $i;
            
            $user->save();
        }
    }
}
