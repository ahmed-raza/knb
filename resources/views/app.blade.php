<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{!! config('vars.site_name') !!} | {!! config('vars.slogan') !!}</title>
</head>
<body>
  <h1>Welcome to {!! config('vars.site_name') !!}</h1>
  <p>Lorem ipsum duis dolore proident occaecat officia cillum esse deserunt irure irure velit reprehenderit non.</p>
</body>
</html>
