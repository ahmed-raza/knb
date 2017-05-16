@extends('app')

@section('title', 'Create Ad')

@section('content')

  <h1>Create new Ad</h1>

  {!! Form::open(['url'=>route('ads.store'), 'enctype'=>'multipart/form-data', 'files'=>true]) !!}
    @include('ads.partials.form', ['submitButtonText' => 'Post Ad','edit' => false])
  {!! Form::close() !!}

@stop
