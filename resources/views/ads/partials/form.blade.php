<div class="form-group">
  <div class="row">
    <div class="col-lg-4">
      {!! Form::label('title') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-4">
      {!! Form::label('City') !!}
      {!! Form::text('city', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-4">
      {!! Form::label('Model Year') !!}
      {!! Form::select('model_year', ['2017'], null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-4">
      {!! Form::label('Manufacturer') !!}
      {!! Form::select('car_make', [], null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-4">
      {!! Form::label('Model') !!}
      {!! Form::select('car_model', [], null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-4">
      {!! Form::label('Version') !!}
      {!! Form::select('car_version', [], null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-4">
      {!! Form::label('Registration City') !!}
      {!! Form::select('registration_city', [], null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-4">
      {!! Form::label('Mileage') !!}
      {!! Form::text('mileage', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-4">
      {!! Form::label('Color') !!}
      {!! Form::select('exterior_color', [], null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12">
      {!! Form::label('Ad Description') !!}
      {!! Form::textarea('description', null, ['class'=>'form-control ckeditor']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12">
      {!! Form::label('Price') !!}
      {!! Form::text('price', null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <fieldset>
    <legend>Upload Images</legend>
    <div class="row">
      <div class="col-lg-12">
        {!! Form::label('Images') !!}
        {!! Form::file('images') !!}
      </div>
    </div>
  </fieldset>
</div>
<div class="row">
  <div class="col-lg-12">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block']) !!}
  </div>
</div>
