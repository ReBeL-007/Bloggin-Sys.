<?php

namespace App\Model\Admin;

use App\Model;

class Role extends Model
{
    //
    public function admins(){
        return $this->belongsToMany(Admin::class,'admin_roles');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
}
