<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingComment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function reading()
    {
        return $this->belongsTo('App\Models\Reading');
    }
}
