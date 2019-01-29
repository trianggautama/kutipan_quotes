@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h1> halaman notif</h1>

                    <div class="list-group">
                      @foreach($notifications as $notif)
                        <li class="list-group-item btn"> <a href="/quotes/{{$notif->quote->slug}}">{{$notif->subject}} di {{$notif->quote->title}}</a></li>
                      @endforeach
                    </div>
                </div>
                <?php
                $notif_model::where('user_id',$user->id)->where('seen',0)->update(['seen'=>1]);
                   ?>
            </div>
        </div>
    </div>
</div>
@endsection
