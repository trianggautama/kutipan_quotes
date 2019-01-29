<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\like;
use App\models\quote;
use App\models\QuoteComments;


use Auth;


class LikeController extends Controller
{
    public function like($type,$model_id){

      $results    = $this->check_type($type,$model_id);
      $model_type =$results[0];
      $model      =$results[1];

      //user tidak boleh like sendiri
      if (Auth::user()->id == $model->user->id)
        die('0');


      //user tidak boleh like berkali kali
        if($model->is_liked()== null){
          like::create([
            'user_id'=>Auth::user()->id,
            'likeable_id'=> $model_id,
            'likeable_type'=>$model_type,
          ]);
  }


  }

  public function unlike($type,$model_id){

    $results    = $this->check_type($type,$model_id);
    $model_type =$results[0];
    $model      =$results[1];

      if($model->is_liked() ){
        like::where('user_id', Auth::user()->id)
                    ->where('likeable_id',$model_id)
                    ->where('likeable_type',$model_type)
                    ->delete();
      }

    }

  public function check_type($type,$model_id){
    if ($type ==1){
      $model_type="App\models\quote";
      $model=quote::find($model_id);
    }
    else{
      $model_type ="App\models\QuoteComments";
      $model=QuoteComments::find($model_id);
    }
    return array($model_type,$model);
  }


}
