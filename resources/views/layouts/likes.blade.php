@if(Auth::check())


<div class="like_wrapper">
      <div class="btn btn-primary btn-lg {{ $content->is_liked() ? 'btn-danger btn-unlike' :'btn-primary btn-like'}}" data-model-id="{{$content->id}}" data-type="{{$model_id}}">{{ $content->is_liked() ? 'Unlike' : 'Like'}}</div>
      <div class="total_like">
      <span class="like_number"> {{$content->likes->count() }}</span>Total Like
      <span class="like_warning" style="display:none;"> ngga boleh like sendiri</span>
  </div>
</div>

@endif
