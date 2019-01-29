<?php

namespace App\models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class QuoteComments extends Model
{
  use LikesTrait;


  protected $fillable = [
      'subject','user_id','quote_id',
  ];

    public function user(){

      return $this->belongsTo('App\Models\User');
    }

    public function quote(){

      return $this->belongsTo('App\Models\quote');
    }

    public function owner(){
    if (Auth::guest())
     return false;

      return Auth::user()->id == $this->user->id;
    }


  
}
