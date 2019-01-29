<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
  protected $fillable = [
      'user_id','likeable_id','likeable_type',
  ];

  public $timestamps=false;

  public function likeable(){
      return $this->morphTo();
    }

}
