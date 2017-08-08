<div class="container admin-menu">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('admin/content') ? 'active' : '' }}"><a href="{{ route('admin.content') }}">Content</a></li>
        <li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">People <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('admin.users') }}">All Users</a></li>
              <li><a href="#">Roles</a></li>
            </ul>
          </li>
        </li>
        <li class="{{ Request::is('admin/contact/submissions') ? 'active' : '' }}"><a href="{{ route('admin.contact_submissions') }}">Contact Submissions</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>
</div>
