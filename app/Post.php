<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user() // 単数形
    {
        return $this->belongsTo('App\User');
    }
}
