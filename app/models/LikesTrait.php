<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;
trait LikesTrait
{

  public function likes(){

    return $this->morphMany('App\Models\like','likeable');
  }

  public function is_liked(){

    return $this->likes->where('user_id',Auth::user()->id)->count();
  }


}
