<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreetalkComment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function freetalk()
    {
        return $this->belongsTo('App\Models\Freetalk');
    }
}
