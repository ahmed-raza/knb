<div class="form-group">
  <div class="row">
    <div class="col-lg-6">
      {!! Form::label('title') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-6">
      {!! Form::label('Make') !!}
      {!! Form::select('car_make', $makers, null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-6">
      {!! Form::label('Model') !!}
      {!! Form::select('car_model', $models, null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-6">
      {!! Form::label('Year') !!}
      {!! Form::date('car_year', ($edit ? $year : null ), ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-6">
      {!! Form::label('Mileage') !!}
      {!! Form::number('car_mileage', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-6">
      {!! Form::label('Color') !!}
      {!! Form::color('car_color', null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-6">
      {!! Form::label('Type') !!}
      {!! Form::select('car_type', $types, null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-6">
      {!! Form::label('Price') !!}
      {!! Form::text('car_price', null, ['class'=>'form-control']) !!}
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
        {!! Form::file('images[]', ['multiple'=>true]) !!}
      </div>
    @if($edit)
      <div class="col-lg-12">
        @foreach($ad->images as $image)
          <div class="default-images">
            {!! Form::hidden('default_images[]', $image->id, ['id'=>'default_images']) !!}
            <img src="data:image/jpeg;base64,{!! base64_encode(CustomHelper::getPath($image, 'thumb')) !!}" width="90" height="90">
            <p><a href="javascript:void(0)" id="remove">Remove</a></p>
          </div>
        @endforeach
      </div>
    @endif
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

@section('scripts')
<script>
  $('.default-images #remove').each(function(){
    $(this).click(function(){
      $(this).parents('.default-images').remove();
    });
  });
</script>
@stop
