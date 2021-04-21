<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\timesheet;
class SheetTableSeeder extends Seeder
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
            $sheet=new timesheet();
            $sheet->name='sheet '.$i;
            $sheet->hard='chan qua '.$i;
            $sheet->plan='khong lam ' . $i;
            $sheet->user_id=1;
            $sheet->save();
        }
    }
}
