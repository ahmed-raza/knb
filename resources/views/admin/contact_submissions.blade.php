@extends('app')

@section('content')
  <fieldset>
    <legend>Contact Submissions</legend>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($submissions as $submission)
          <tr>
            <td><strong>{{ $submission->name }}</strong></td>
            <td>{{ $submission->email }}</td>
            <td>{{ \Carbon\Carbon::parse($submission->created_at)->format('d F, Y h:i:s a') }}</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Edit</a></li>
                </ul>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </fieldset>
  {!! $submissions->links() !!}
@endsection
