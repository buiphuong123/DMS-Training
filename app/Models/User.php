<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\TimeSheet;
use App\Models\Permissions;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'description',
        'avatar',
        'permission_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function timesheet()
    {        
        return $this->hasMany('App\Models\TimeSheet');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function permission() {

        return $this->belongsTo(Permissions::class, 'permission_id');
            
     }

    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first())
        {
            return true;
        }
        return false;
    }
    
}





