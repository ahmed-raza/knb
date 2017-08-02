@extends('app')

@section('content')
  <p>Are you sure you want to delete `{{ $item }}`?</p>
  {!! Form::open(['url'=>$route, 'method'=>'DELETE']) !!}
  {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
  {!! HTML::link(URL::previous(), 'Cancel', ['class'=>'btn btn-primary']) !!}
  {!! Form::close() !!}

@endsection
