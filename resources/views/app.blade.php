<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{!! config('vars.site_name') !!} | @yield('title')</title>
  {!! HTML::style('css/all.css') !!}
  {!! HTML::script('js/all.js') !!}
</head>
<body>
  @yield('content')
</body>
</html>
