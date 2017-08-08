@extends('app')

@section('content')
  <fieldset>
    <legend>Users</legend>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td><strong>{!! HTML::link('user/'.$user->id, $user->name) !!}</strong></td>
            <td>{{ $user->email }}</td>
            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d F, Y h:i:s a') }}</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>{!! HTML::linkRoute('user.edit', 'Edit', $user->id) !!}</li>
                </ul>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </fieldset>
  {!! $users->links() !!}
@endsection
