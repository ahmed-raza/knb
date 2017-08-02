@extends('app')

@section('sidebar')
  <div class="well">
    <fieldset>
      <legend>Users</legend>
      <ul>
      @foreach($users as $user)
        @if($user->rank == 'admin')
        <li>{!! HTML::link('user/'.$user->id, $user->name.' ('.$user->rank.')') !!}</li>
        @else
        <li>{!! HTML::link('user/'.$user->id, $user->name) !!}</li>
        @endif
      @endforeach
      </ul>
    </fieldset>
  </div>
@endsection

@section('content')
  <fieldset>
    <legend>Ads</legend>
    {!! Form::open(['url'=>route('ads.operations')]) !!}
    <div class="form-group">
      <div class="row">
        <div class="col-lg-4">
          {!! Form::select('bulk_actions',['delete'=>'Delete', 'publish'=>'Publish', 'unpublish'=>'Unpublish'], null,['class'=>'form-control']) !!}
        </div>
        <div class="col-lg-4">
          {!! Form::submit('Save' ,['class'=>'btn btn-success']) !!}
        </div>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>{!! Form::checkbox('all',null, null,['id'=>'all']) !!}</th>
          <th>Title</th>
          <th>By</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ads as $ad)
          <tr>
            <td>{!! Form::checkbox('id[]', $ad->id, null, ['id'=>'check-object']) !!}</td>
            <td><strong>{!! HTML::link('articles/'.$ad->slug, $ad->title) !!}</strong></td>
            <td>{{ $ad->user->name }}</td>
            <td>{{ \Carbon\Carbon::parse($ad->created_at)->format('d F, Y h:i:s a') }}</td>
            <td>{!! $ad->status ? 'Published' : 'Not published' !!}</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>{!! HTML::linkRoute('ads.edit', 'Edit', $ad->id) !!}</li>
                  <li>{!! HTML::linkRoute('ads.delete', 'Delete', $ad->id) !!}</li>
                </ul>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!! Form::close() !!}
    {!! HTML::link('ads', 'See All', ['class'=>'pull-right']) !!}
  </fieldset>
  <script type="text/javascript">
    $(document).ready(function(){
      $('form input#all').click(function(){
        var checked = $(this).prop('checked');
        $(this).closest('table').find(':checkbox').prop('checked', checked);
      });
    });
  </script>
@endsection
