<?php

namespace App\models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class quote extends Model
{
  use LikesTrait;

  protected $fillable = [
      'title', 'slug', 'subject','user_id',
  ];

    public function user(){

      return $this->belongsTo('App\Models\User');
    }

public function owner(){
if (Auth::guest())
 return false;

  return Auth::user()->id == $this->user->id;
}


public function Comments(){

  return $this->hasMany('App\Models\QuoteComments');
}

public function tags(){

  return $this->belongsToMany('App\Models\tag');
}


}
