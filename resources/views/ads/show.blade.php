@extends('app')

@section('content')
  
  <div class="row">  
    <h1 class="{{ (CustomHelper::owner($ad)) ? 'col-lg-10' : 'col-lg-12' }}">{{ $ad->title }}</h1>
    @if(Auth::check() && Auth::user()->id === $ad->user->id)
      <div class="dropdown pull-right col-lg-2 user-actions">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="{{ route('ads.edit', $ad->id) }}">Edit</a></li>
          <li><a href="{{ route('ads.delete', $ad->id) }}">Delete</a></li>
        </ul>
      </div>
      <div class="clearfix"></div>
    @endif
  </div>
  @unless($ad->images->isEmpty())
    <div class="flexslider">
      <ul class="slides">
        @foreach($ad->images as $image)
          <li><img src="data:image/jpeg;base64,{{ base64_encode(CustomHelper::getPath($image, null)) }}" alt="Ad Image"></li>
        @endforeach
      </ul>
    </div>
  @endunless
  <div class="jumbotron">
    <div class="row">
      <div class="col-lg-6">
        <p><strong>Price: </strong>{{ $ad->car_price }} PKR</p>
        <p><strong>Make: </strong>{{ $ad->car_make }}</p>
        <p><strong>Model: </strong>{{ $ad->car_model }}</p>
        <p><strong>Year: </strong>{!! \Carbon\Carbon::createFromTimestamp($ad->car_year)->format('Y') !!}</p>
        <p><strong>Color: </strong><span class="color-palette" style="background: {{ $ad->car_color }}"></span></p>
        <p><strong>Type: </strong>{{ $ad->car_type }}</p>
        <p><strong>Mileage: </strong>{{ $ad->car_mileage }}</p>
      </div>
      <div class="col-lg-6"></div>
    </div>
  </div>
  {!! $ad->description !!}
@stop

@section('sidebar')
<fieldset>
  <legend>Contact</legend>
  <p><strong>{{ $ad->user->name }}</strong></p>
  <p><strong>Email: </strong>{{ $ad->user->email }}</p>
  <p><strong>Phone: </strong>{{ $ad->user->phone }}</p>
</fieldset>
@include('ads.partials.contact')
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
