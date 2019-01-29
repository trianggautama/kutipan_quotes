@extends('layouts.app')

@section('content')
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
                <div class="panel-heading">Create Quote</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/quotes">

                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title"  value="{{old('title')}}">


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="col-md-2 control-label">Subject</label>

                            <div class="col-md-6">
                              <textarea name="subject" rows="8" cols="76">{{old('subject')}}</textarea>

                            </div>
                        </div>

                        <div class="form-group">
                          <div id="tag_wrapper">
                            <label for="" class="col-md-2 control-label"> Tag (max 3)</label>
                            <div id="add_tag" >
                              Add  tag
                            </div>
                            @if(old('tags'))
                              @for($i=0; $i < count(old('tags')); $i++)
                              <select class="" name="tags[]" id="tag_select">
                                <option value="0">tidak ada tag</option>

                                @foreach( $tags as $tag)
                                  <option value="{{$tag->id}}"
                                  @if(old('tags.'.$i)==$tag->id ) selected="selected"  @endif >
                                      {{$tag->name}}</option>
                                @endforeach
                              </select>
                              @endfor
                            @else
                            <select class="" name="tags[]" id="tag_select">
                              <option value="0">tidak ada tag</option>

                              @foreach( $tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                              @endforeach
                            </select>
                            @endif


                          <script src="{{asset('js/tag.js')}}"></script>
                          </div>
                        </div>


                        <div class="form-group ">
                            <div class="col-md-10 col-md-offset-2 pull-right">
                                <button type="submit" class="btn btn-default btn-blog">
                                Submit Quote
                                </button>


                            </div>
                        </div>
                        {{ csrf_field() }}

                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
