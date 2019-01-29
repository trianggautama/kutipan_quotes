<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
  protected $guarded = ['id'];

public function user(){
  return $this->belongsTo('App\models\User');
}

public function quote(){
  return $this->belongsTo('App\models\quote');
}



}
