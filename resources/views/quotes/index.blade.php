@extends('layouts.app')

@section('content')
<div class="container">

      @if(session('msg'))
      <div class="alert alert-success">

          <p>{{session('msg')}}</p>

      </div>
      @endif
      <div class="row">

        <form class="navbar-form navbar-left" action="/quotes" method="get">
          <div class="form-group">
            <input type="text" name="search"  class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default" name="button">Submit</button>
        </form>
        Filter Tag:
        @foreach($tags as $tag)
         <a href="/quotes/filter/{{$tag->name}}">/{{$tag->name}}</a>
        @endforeach
        <div class="col-md-5 col-md-offset-4">
        <a href="/quotes/" class="btn btn-default"> All</a>
        <a href="/quotes/random" class="btn btn-default"> Random</a>
        <a href="/quotes/create" class="btn btn-default"> Create</a>
<br>
</div>

 <br>
 <br>

@foreach($quotes as $q)
<div class="col-md-4 thumbnail ">
<h5>{{$q->title}}</h5>
<hr>
<p>tag:
  @foreach($q->tags as $tag)
    <span>{{$tag->name}}</span>
  @endforeach
</p>
<p>wrtite by:- {{$q->user->name}}</p>

<a href="/quotes/{{$q->slug}}" class="btn btn-info">read more </a>
</div>
@endforeach

</div>
    </div>
</div>
@endsection
