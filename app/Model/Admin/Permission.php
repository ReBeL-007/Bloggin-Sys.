<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    //
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
