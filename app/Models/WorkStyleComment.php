<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkStyleComment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function work_style()
    {
        return $this->belongsTo('App\Models\WorkStyle');
    }
}
