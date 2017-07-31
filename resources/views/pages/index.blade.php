@extends('app')

@section('title', 'Welcome')

@section('content')

  <div class="flexslider">
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
  <h1>Welcome to <span style="color: #006621;">{!! config('vars.site_name') !!}</span></h1>
  <div class="jumbotron"><p>Lorem ipsum duis dolore proident occaecat officia cillum esse deserunt irure irure velit reprehenderit non.</p></div>

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
