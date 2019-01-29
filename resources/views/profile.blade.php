@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h1>{{$user->name}}</h1>
                    <h4>{{$user->email}}</h4>
                    <br><br>
                    <div class="list-group">
                      @foreach($user->quotes as $quote)
                        <li class="list-group-item btn"> <a href="/quotes/{{$quote->slug}}">{{$quote->title}}</a></li>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
