{!! Form::open(['url'=>route('ads.message', $ad->id)]) !!}

  <div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class'=>$errors->has('name') ? 'form-control has-error' : 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('phone') !!}
    {!! Form::text('phone', null, ['class'=>$errors->has('phone') ? 'form-control has-error' : 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('message') !!}
    {!! Form::textarea('message', null, ['class'=>$errors->has('message') ? 'ckeditor has-error' : 'ckeditor']) !!}
  </div>
  <div class="form-group">
    {!! Form::submit('Send', ['class'=>'btn btn-success btn-block']) !!}
  </div>

{!! Form::close() !!}
