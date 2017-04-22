<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    //


    use Searchable;


    public function estate()
    {
        return $this->hasOne('App\Estate');
    }
    public function electronic ()
    {
        return $this->hasOne('App\Electronic');
    }
    public function vehicle ()
    {
        return $this->hasOne('App\Vehicle');
    }


}
