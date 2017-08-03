@extends('app')

@section('title', 'Welcome')

@section('content')

  <div class="flexslider">
    <div class="banner-description">
      <h1>Welcome to {!! config('vars.site_name') !!}</h1>
      <p>Lorem ipsum duis dolore proident occaecat officia cillum esse deserunt irure irure velit reprehenderit non.</p>
    </div>
    <ul class="slides">
      <li>
        <img src="images/car1.jpg" />
      </li>
      <li>
        <img src="images/car2.jpg" />
      </li>
      <li>
        <img src="images/car3.jpg" />
      </li>
    </ul>
  </div>
  @if($ads)
    @foreach($ads->chunk(3) as $ads)
      <div class="row">
        @foreach($ads as $ad)
          <div class="col-lg-4">
            @unless($ad->images->isEmpty())
              <img src="data:image/jpeg;base64,{{ base64_encode(CustomHelper::getPath($ad->images[0], 'thumb')) }}" alt="Ad Image" class="img-thumbnail">
            @endunless
            <h2><a href="{{ route('ads.show', $ad->id) }}">{{ $ad->title }}</a></h2>
            <p><em>{{ $ad->created_at->diffForHumans() }}</em></p>
            {!! str_limit($ad->description, 300) !!}
          </div>
        @endforeach
      </div>
    @endforeach
  @endif

@stop

@section('scripts')
<script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });
  });
</script>
@stop
