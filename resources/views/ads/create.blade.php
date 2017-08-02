@extends('app')

@section('title', 'Create Ad')

@section('content')

  <h1>Create new Ad</h1>

  {!! Form::open(['url'=>route('ads.store'), 'enctype'=>'multipart/form-data', 'files'=>true]) !!}
    @include('ads.partials.form', ['submitButtonText' => 'Post Ad','edit' => false])
    <div class="row">
      <div class="col-lg-12"><p>Your contact information will be pulled from your profile.</p></div>
    </div>
  {!! Form::close() !!}

@stop
