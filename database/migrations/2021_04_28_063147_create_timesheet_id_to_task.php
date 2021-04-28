<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetIdToTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
               

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function($table){
            $table->dropColumn('timesheet_id');
        });
    }
    
}
