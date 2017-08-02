{!! Form::open(['url'=>route('ads.message', $ad->id)]) !!}

  <div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('phone') !!}
    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('message') !!}
    {!! Form::textarea('message', null, ['class'=>'form-control ckeditor']) !!}
  </div>
  <div class="form-group">
    {!! Form::submit('Send', ['class'=>'btn btn-success btn-block']) !!}
  </div>

{!! Form::close() !!}
