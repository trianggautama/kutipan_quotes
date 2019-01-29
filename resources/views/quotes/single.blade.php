@extends('layouts.app')

@section('content')
<div class="container">

<div class="jumbotron">
<h1>{{$quote->title}}</h1>
<p>{{$quote->subject}}</p>
<p> wrtite by:- <a href="/profile/{{$quote->user->id}} "> {{$quote->user->name}} </a></p>
<a href="/quotes" class="btn btn-warning btn-lg"> Back</a>


    @component('layouts/likes',
    [ 'content'=>$quote,'model_id'=> 1])
    @endcomponent

@if($quote->owner())
     <a href="/quotes/{{$quote->id}}/edit" class="btn btn-success btn-sm"> Edit</a>


<form  action="/quotes/{{$quote->id}}" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="DELETE">
             <button type="submit" class="btn btn-danger">
delete             </button>
           </form>

@endif
</div>
@if(session('msg'))
<div class="alert alert-success">

    <p>{{session('msg')}}</p>

</div>
@endif

@foreach($quote->comments as $comment)
<div class="row">

<div class="col-sm-6">

<p>{{$comment->subject}}</p>
<p> wrtite by:- <a href="/profile/{{$comment->user->id}} "> {{$comment->user->name}} </a></p>
</div>
<div class="col-sm-2">

@if($comment->owner())

     <a href="/quotes-comment/{{$comment->id}}/edit" class="btn btn-success btn-sm"> Edit</a>
<br>
</div>
<div class="col-sm-2 ">

<form  action="/quotes-comment/{{$comment->id}}" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="DELETE">
             <button type="submit" class="btn btn-danger pull-left ">
delete             </button>
           </form>

@endif

</div>
<div class="col-sm-2 ">
  @component('layouts/likes',
  ['content'=>$comment,'model_id'=> 2])
  @endcomponent


</div>



</div>

@endforeach

<div class="row">
  @if(count($errors)>0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li> {{ $error }}</li>
      @endforeach
    </ul>
  </div>
  <hr>

  @endif
  </div>
<form class="form-horizontal" method="POST" action="/quotes-comment/{{$quote->id}}">

<div class="form-group">
    <label for="password" class="col-md-2 control-label">Comment</label>

    <div class="col-md-6">
      <textarea name="subject" rows="8" cols="80">{{old('subject')}}</textarea>

    </div>
</div>
<div class="form-group ">
    <div class="col-md-10 col-md-offset-2 pull-right">
        <button type="submit" class="btn btn-primary">
        Submit Comment
        </button>


    </div>
</div>
{{ csrf_field() }}
</form>

<script src="{{asset('js/quote.js')}}" charset="utf-8">

</script>
</div>
@endsection
