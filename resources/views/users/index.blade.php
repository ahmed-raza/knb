@extends('app')

@section('title', 'Profile')

@section('content')

  <h1>{{ $user->name }}</h1>

  <p><strong>Email:</strong> {!! $user->email !!}</p>
  <p><strong>Phone:</strong> {!! $user->phone !!}</p>

@stop

@section('sidebar')

  <fieldset>
    <legend>My Ads</legend>
    @unless($user->ads->isEmpty())
      <div class="list-group">
        @foreach($user->ads as $userAds)
          <a href="{{ route('ads.show', $userAds->id) }}" class="list-group-item">{{ $userAds->title }}<span title="Messages" class="badge">{{ count($userAds->messages) }}</span></a>
        @endforeach
      </div>
    @endunless
  </fieldset>

  <fieldset>
    <legend>Messages</legend>
    @unless($user->messages->isEmpty())
      <div class="list-group">
        @foreach($user->messages as $userMessages)
          <a class="list-group-item" href="#"><strong>{{ $userMessages->name }}</strong></a>
        @endforeach
      </div>
    @endunless
  </fieldset>

@stop
