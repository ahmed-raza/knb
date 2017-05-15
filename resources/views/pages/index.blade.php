@extends('app')

@section('title', 'Welcome')

@section('content')

  <h1>Welcome to <span style="color: #006621;">{!! config('vars.site_name') !!}</span></h1>
  <p>Lorem ipsum duis dolore proident occaecat officia cillum esse deserunt irure irure velit reprehenderit non.</p>
  {!! Form::open() !!}
  {!! Form::label('Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
  {!! Form::close() !!}

@stop
