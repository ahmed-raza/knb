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
    <a class="navbar-brand" href="/">Laravel 5.1</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">About</a></li>
      @if(!Auth::user())
      @endif
    </ul>
    <ul class="nav navbar-nav navbar-right">
      @if(Auth::user())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('user.show', Auth::id()) }}">Profile</a></li>
            @if(Auth::user()->rank == 'admin')
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('admin') }}">Admin</a></li>
            @endif
            <li role="separator" class="divider"></li>
            <li><a href="{{ Auth::logout() }}">Logout</a></li>
          </ul>
        </li>
      @else
        <li class="{{ Request::is('auth/login') ? 'active' : '' }}"><a href="/auth/login">Login</a></li>
        <li class="{{ Request::is('auth/register') ? 'active' : '' }}"><a href="/auth/register">Register</a></li>
      @endif
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
