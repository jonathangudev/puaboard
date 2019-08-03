<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class FieldReport extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
