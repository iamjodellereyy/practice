<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{   
    //this property is to have no problem with fillables, mass assignment
    protected $guarded = [];

    //I am following laravels convention so I dont need to put a second paramater that is the exact name of the table
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

   
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
