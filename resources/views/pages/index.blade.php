@extends('app')

@section('title', 'Welcome')

@section('content')

  <div class="flexslider">
    <div class="banner-description">
      <h1>Welcome to {!! config('vars.site_name') !!}</h1>
      <p>Lorem ipsum duis dolore proident occaecat officia cillum esse deserunt irure irure velit reprehenderit non.</p>
    </div>
    <ul class="slides">
      <li>
        <img src="images/car1.jpg" />
      </li>
      <li>
        <img src="images/car2.jpg" />
      </li>
      <li>
        <img src="images/car3.jpg" />
      </li>
    </ul>
  </div>

@stop

@section('scripts')
<script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });
  });
</script>
@stop
