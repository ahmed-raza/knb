<div class="container main-menu">
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><i class="logo fa fa-1x fa-car"></i>{!! env('APP_NAME') !!}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
        <li class="{{ Request::is('ads') ? 'active' : '' }}"><a href="{{ route('ads.index') }}">Ads</a></li>
        <li class="{{ Request::is('team') ? 'active' : '' }}"><a href="{{ route('team') }}">Team</a></li>
        <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact.index') }}">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="{{ Request::is('ads/create') ? 'active' : '' }}"><a href="{{ route('ads.create') }}">Create ad</a></li>
        @if(Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('user.profile') }}">Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('user.logout', Auth::user()->id) }}">Logout</a></li>
            </ul>
          </li>
        @else
          <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="/login">Login</a></li>
          <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="/register">Register</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>
</div>
