<fieldset>
  <legend>Search</legend>
  <form action="{{ route('ads.index') }}" id="ad-search" method="GET">
    {!! csrf_field() !!}
    <div class="form-group">
      <input type="text" name="title" id="title" placeholder="Keywords.." class="form-control">
    </div>
    <div class="form-group">
      <p><strong>Make</strong></p>
      @foreach(\App\Ad::makers() as $key => $make)
        <div class="make-checkboxes checkbox checkboxes">
          <label for="make-{{$key}}">
            <input type="checkbox" name="make[{{ $key }}]" class="make" id="make-{{$key}}" value="{{ $make }}">{{ $make }}
          </label>
        </div>
      @endforeach
    </div>
    <div class="form-group">
      <p><strong>Model</strong></p>
      @foreach(\App\Ad::models() as $key => $model)
        <div class="model-checkboxes checkbox checkboxes">
          <label for="model-{{$key}}">
            <input type="checkbox" name="model[{{ $key }}]" class="model" id="model-{{$key}}" value="{{ $model }}">{{ $model }}
          </label>
        </div>
      @endforeach
    </div>
    <div class="form-group">
      <p><strong>Type</strong></p>
      @foreach(\App\Ad::types() as $key => $type)
        <div class="type-checkboxes checkbox checkboxes">
          <label for="type-{{$key}}">
            <input type="checkbox" name="type[{{ $key }}]" class="type" id="type-{{$key}}" value="{{ $type }}">{{ $type }}
          </label>
        </div>
      @endforeach
    </div>
    <div class="form-group">
      <label>Price Range</label>
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">Min</span>
        <input type="number" class="form-control" id="min-price">
        <span class="input-group-addon" id="sizing-addon2">Max</span>
        <input type="number" class="form-control" id="max-price">
      </div>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-block btn-success" value="Search">
    </div>
  </form>
</fieldset>
<script type="text/javascript">
  $('#ad-search').submit(function(e){
    e.preventDefault();
    var action = $(this).attr('action');
    var title = $(this).find('#title').val();
    var min_price = $(this).find('#min-price').val();
    var max_price = $(this).find('#max-price').val();
    var make = [];
    var model = [];
    var type = [];
    $(this).find('.make:checked').each(function(){
      make.push($(this).val());
    });
    $(this).find('.model:checked').each(function(){
      model.push($(this).val());
    });
    $(this).find('.type:checked').each(function(){
      type.push($(this).val());
    });

    $.ajax({
      type: 'GET',
      url: action,
      data: {
        _token: "{{ csrf_token() }}",
        title: title,
        car_make: make,
        car_model: model,
        car_type: type,
        min_price: min_price,
        max_price: max_price,
      },
      success: function(data){
        $('.ads').attr('id', 'results');
        $('#results').html(data);
      }
    });

  });
</script>
