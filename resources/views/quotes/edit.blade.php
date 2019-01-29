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
                    <form class="form-horizontal" method="POST" action="/quotes/{{$quote->id}}">

                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title"  value="{{(old('title')) ? old('title'): $quote->title}}">


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Subject</label>

                            <div class="col-md-6">
                              <textarea name="subject" rows="8" cols="80">{{(old('subject')) ? old('subject'): $quote->subject}}</textarea>

                            </div>
                        </div>

                        <div class="form-group">
                          <div id="tag_wrapper">
                            <label for="" class="col-md-2 control-label"> Tag (max 3)</label>
                            <div id="add_tag" >
                              Add  tag
                            </div>
                          @foreach($quote->tags as $oldtags)
                            <select class="" name="tags[]" id="tag_select">
                              <option value="0">tidak ada tag</option>

                              @foreach( $tags as $tag)
                                <option value="{{$tag->id}}"
                                    @if($oldtags->id == $tag->id)
                                   selected="selected"
                                   @endif
                                   >{{$tag->name}}</option>
                              @endforeach
                            </select>
                          @endforeach
                          <script src="{{asset('js/tag.js')}}"></script>
                          </div>
                        </div>



                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group ">
                            <div class="col-md-10 col-md-offset-2 pull-right">
                                <button type="submit" class="btn btn-primary">
                                Submit Quote
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
