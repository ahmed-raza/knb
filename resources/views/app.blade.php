<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{!! config('vars.site_name') !!} | @yield('title')</title>
  {!! HTML::style('public/css/app.css') !!}
</head>
<body>
  @yield('content')
</body>
</html>
