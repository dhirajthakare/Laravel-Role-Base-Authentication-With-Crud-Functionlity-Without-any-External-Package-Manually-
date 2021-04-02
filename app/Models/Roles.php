<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public function advisors()
    {
        return $this->belongsToMany('App\Models\User', 'App\Models\Users_roles','roles_id','users_id');
    }
}

