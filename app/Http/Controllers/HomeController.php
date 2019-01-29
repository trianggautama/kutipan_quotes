<?php

namespace App\Http\Controllers;

use App\models\User;
use Auth;
use App\models\notification;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile($id = null){

if ($id == null)
      $user= User::findOrfail(Auth::user()->id);
else
      $user= User::findOrfail($id);

      return view('profile',compact('user'));
    }

    public function get_notif(){
      $user= Auth::user();
      $notifications= notification::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
      $notif_model = new notification;
      return view('notifications',compact('notifications','notif_model','user'));
    }
}
