@extends('app')


@section('content')

  <h1>Edit: {!! HTML::link('ads/'.$ad->id, $ad->title) !!}</h1>

  {!! Form::model($ad, ['method'=>'PATCH', 'url'=>'ads/'.$ad->id, 'enctype' => 'multipart/form-data', 'files'=>true]) !!}
    @include('ads.partials.form', ['submitButtonText' => 'Update ad','edit' => true])
  {!! Form::close() !!}

@stop
