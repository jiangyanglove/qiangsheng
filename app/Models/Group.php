<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users()
    {
        return $this->hasMany('App\Models\GroupUser');
    }
    public function leader()
    {
        return $this->belongsTo('App\Models\User', 'leader_user_id');
    }
}
