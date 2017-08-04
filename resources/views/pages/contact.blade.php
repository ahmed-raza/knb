@extends('app')

@section('title', 'Contact')

@section('body-class', 'contact')

@section('content')

  <h1>Contact</h1>
  {!! Form::open(['url'=>route('contact.store')]) !!}
    <div class="form-group">
      {!! Form::label('name') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email') !!}
      {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('subject') !!}
      {!! Form::text('subject', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('message') !!}
      {!! Form::textarea('message', null, ['class'=>'form-control ckeditor']) !!}
    </div>
    <div class="form-group">
      <input type="submit" value="Send" class="btn btn-block btn-warning">
    </div>
  {!! Form::close() !!}
@stop
