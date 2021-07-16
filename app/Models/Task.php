<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TimeSheet;
class Task extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_id',
        'infomation',
        'time',
    ];

    protected $table = 'tasks';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function timesheet() {
        return $this->belongsToMany(TimeSheet::class, 'task_timesheet', 'tasks_id', 'sheet_id');
    }
}
  

