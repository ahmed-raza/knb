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
      <ul class="list-group">
        @foreach($user->ads as $userAds)
          <li class="list-group-item"><strong><a href="{{ route('ads.show', $userAds->id) }}">{{ $userAds->title }}</a></strong><span title="Messages" class="badge">{{ count($userAds->messages) }}</span></li>
        @endforeach
      </ul>
    @endunless
  </fieldset>

@stop
