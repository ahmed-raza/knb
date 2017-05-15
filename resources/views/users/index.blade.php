@extends('app')

@section('title', 'Profile')

@section('content')

  <h1>{{ $user->name }}</h1>

  <strong>Email:</strong> {!! $user->email !!}

@stop
