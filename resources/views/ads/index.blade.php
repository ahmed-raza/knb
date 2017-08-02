@extends('app')

@section('title', 'Ads')

@section('content')
  <h1>Ads</h1>
  <hr>
  @foreach($ads as $ad)
    <div class="row">
      @unless($ad->images->isEmpty())
        <div class="col-lg-4">
          <img src="data:image/jpeg;base64,{{ base64_encode(CustomHelper::getPath($ad->images[0], 'thumb')) }}" alt="Ad Image">
        </div>
      @endunless
      <div class="{!! ($ad->images->isEmpty() ? 'col-lg-12' : 'col-lg-8') !!}">
        <h2><a href="{{ route('ads.show', $ad->id) }}">{{ $ad->title }}</a></h2>
      </div>
    </div>
  @endforeach
@stop
