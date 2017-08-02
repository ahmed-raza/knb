@extends('app')

@section('title', 'Profile')

@section('content')

  <h1>{{ $user->name }}</h1>

  <p><strong>Email:</strong> {!! $user->email !!}</p>
  <p><strong>Phone:</strong> {!! $user->phone !!}</p>

  @unless($user->ads->isEmpty())
    <ul>
      @foreach($user->ads as $userAds)
        <li><strong><a href="{{ route('ads.show', $userAds->id) }}">{{ $userAds->title }}</a></strong><span> (messages: {{ count($userAds->messages) }})</span></li>
      @endforeach
    </ul>
  @endunless

@stop
