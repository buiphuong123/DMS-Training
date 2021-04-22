<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timesheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hard',
        'plan',
        'user_id',
    ];

    public function Us(){
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->hasMany(task::class);
    }
}
