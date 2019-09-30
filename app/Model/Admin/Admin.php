<?php

namespace App\Model\Admin;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //
    // public function roles(){
    //     return $this->belongsToMany(Role::class,'admin_roles');
    // }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles(){
       return $this->belongsToMany('App\Model\Admin\Role','admin_roles');
    }

    // public function isSuperAdmin() {
    //     return $this->roles()->where('name', 'SuperAdmin')->exists();
    //  }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
