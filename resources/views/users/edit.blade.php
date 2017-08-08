@extends('app')

@section('title', 'Edit User Profile')
@section('body-class', 'user-edit-form')

@section('content')

  <h1>Edit: <a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></h1>

  {!! Form::open(['url'=>route('user.update', $user->id), 'enctype'=>'multipart/form-data', 'files'=>true]) !!}
  <div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('email') !!}
    {!! Form::email('email', $user->email, ['class'=>'form-control', 'disabled'=>true]) !!}
  </div>
  <div class="form-group">
    {!! Form::label('phone') !!}
    {!! Form::text('phone', $user->phone, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-lg-6">
        {!! Form::label('pic') !!}
        {!! Form::file('pic', ['class'=>'form-control', 'multiple'=>false]) !!}
      </div>
      @if($user->pic)
        {!! Form::hidden('remove-pic', 0, ['id'=>'remove']) !!}
        <div class="col-lg-6 user-pic">
          <img src="data:image/jpeg;base64,{{ base64_encode(Storage::get('users/'.$user->id.'/thumb_'.$user->pic)) }}" alt="">
          <a href="javscript:void(0)" style="display: block" id="remove-pic">Remove</a>
        </div>
      @endif
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('bio') !!}
    {!! Form::textarea('bio', $user->bio, ['class'=>'ckeditor']) !!}
  </div>
  <div class="form-group">
    {!! Form::submit('Update', ['class'=>'btn btn-primary btn-block']) !!}
  </div>
  {!! Form::close() !!}

  <script type="text/javascript">
    $('#remove-pic').click(function(){
      $(this).parents('.user-pic').remove();
      $('input#remove').val(1);
    });
  </script>

@stop
