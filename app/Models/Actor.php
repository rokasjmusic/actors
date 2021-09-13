<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    public function actorMovies()
   {
       return $this->hasMany('App\Models\Movie', 'actor_id', 'id');
   }

}
