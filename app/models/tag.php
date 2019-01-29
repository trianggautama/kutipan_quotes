<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{


  public function quotes(){

    return $this->belongsToMany('App\Models\quote');
  }

}
