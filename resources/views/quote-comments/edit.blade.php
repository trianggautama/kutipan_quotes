@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if(count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Quote</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/quotes-comment/{{$comment->id}}">


                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Comment</label>

                            <div class="col-md-6">
                              <textarea name="subject" rows="8" cols="80">{{(old('subject')) ? old('subject'): $comment->subject}}</textarea>

                            </div>
                        </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group ">
                            <div class="col-md-10 col-md-offset-2 pull-right">
                                <button type="submit" class="btn btn-primary">
                                Submit Comment
                                </button>


                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
