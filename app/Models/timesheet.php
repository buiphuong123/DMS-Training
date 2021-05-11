<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class TimeSheet extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'hard',
        'plan',
        'date_create',
       
    ];
    protected $table = 'time_sheets';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function task()
    {
        return $this->belongsToMany('App\Models\Task', 'task_timesheet', 'sheet_id', 'tasks_id');
    }
    
}
