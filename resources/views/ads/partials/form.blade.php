<div class="form-group">
  <div class="row">
    <div class="col-lg-6">
      {!! Form::label('title') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-6">
      {!! Form::label('Make') !!}
      {!! Form::select('car_make', ['toyo'=>'Toyo'], null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-6">
      {!! Form::label('Model') !!}
      {!! Form::select('car_model', $years, null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-6">
      {!! Form::label('Year') !!}
      {!! Form::select('car_year', ['civic'=>'Civic'], null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-6">
      {!! Form::label('Mileage') !!}
      {!! Form::number('mileage', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-6">
      {!! Form::label('Color') !!}
      {!! Form::color('car_color', null, ['class'=>'form-control']) !!}
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
  <div class="row">
    <div class="col-lg-12">
      {!! Form::label('Ad Description') !!}
      {!! Form::textarea('description', null, ['class'=>'form-control ckeditor']) !!}
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
<div class="form-group">
  <fieldset>
    <legend>Contact Information</legend>
    <div class="row">
      <div class="col-lg-6">
        {!! Form::label('Seller Name') !!}
        {!! Form::text('seller_name', null, ['class'=>'form-control']) !!}
      </div>
      <div class="col-lg-6">
        {!! Form::label('Mobile Number') !!}
        {!! Form::text('mobile_number', null, ['class'=>'form-control']) !!}
      </div>
    </div>
  </fieldset>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12">
      {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
</div>
