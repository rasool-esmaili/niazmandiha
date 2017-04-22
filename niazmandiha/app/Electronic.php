<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Electronic extends Model
{
    use Searchable;

    public function post()
    {
        return $this->belongsTo('App\Post');    
    }
}
