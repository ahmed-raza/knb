<p>Stay informed - subscribe to our newsletter.</p>
{!! Form::open(['url'=>'']) !!}
  <div class="form-group">
    {!! Form::label('email') !!}
    {!! Form::email('email', null, ['class'=>$errors->has('email') ? 'form-control has-error' : 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::submit('Subcribe', ['class'=>'btn btn-primary btn-block']) !!}
  </div>
{!! Form::close() !!}
