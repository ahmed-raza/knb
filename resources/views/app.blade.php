<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{!! config('app.name') !!} | @yield('title')</title>
  {!! HTML::style('css/all.css') !!}
  {!! HTML::script('js/all.js') !!}
  {!! HTML::script('ckeditor/ckeditor.js') !!}
</head>
<body>
  @include('partials.nav')
  <div class="container">
    @include('errors.messages')
    <div class="row">
    @if(array_key_exists('sidebar', View::getSections()))
      <div class="col-lg-8">@yield('content')</div>
      <div class="col-lg-4">@yield('sidebar')</div>
      @else
      <div class="col-lg-12">@yield('content')</div>
    @endif
    </div>
  </div>
</body>
</html>
