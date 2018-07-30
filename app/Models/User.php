<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $fillable = ['name', 'password', 'wwid', 'sex', 'city', 'logins', 'last_login_at'];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}
