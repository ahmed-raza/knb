@foreach($ads as $ad)
  <div class="row ad-row">
    @unless($ad->images->isEmpty())
      <div class="col-lg-4">
        <img src="data:image/jpeg;base64,{{ base64_encode(CustomHelper::getPath($ad->images[0], 'thumb')) }}" alt="Ad Image" class="ad-thumb img-thumbnail img-responsive">
      </div>
    @endunless
    <div class="{!! ($ad->images->isEmpty() ? 'col-lg-12' : 'col-lg-8') !!}">
      <h2><a href="{{ route('ads.show', $ad->id) }}">{{ $ad->title }}</a></h2>
      <p><em>{{ $ad->created_at->diffForHumans() }}</em></p>
      <p><strong>Price: </strong>{{ $ad->car_price }} PKR</p>
      <p><strong>Make: </strong>{{ $ad->car_make }}</p>
      <p><strong>Model: </strong>{{ $ad->car_model }}</p>
      {!! str_limit($ad->description, 350) !!}
    </div>
  </div>
@endforeach
