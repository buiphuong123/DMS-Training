<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "reports";

    protected $fillable = [
        'user_id',
        'month',
        'registrantion_time',
        'registrantion_late_time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
