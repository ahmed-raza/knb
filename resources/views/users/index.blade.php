@extends('app')

@section('title', 'Profile')

@section('content')

  <h1>{{ $user->name }}</h1>

  <p><strong>Email:</strong> {!! $user->email !!}</p>
  <p><strong>Phone:</strong> {!! $user->phone !!}</p>

@stop

@section('sidebar')

  <fieldset class="user-messages">
    <legend>My Ads</legend>
    @unless($user->ads->isEmpty())
      <div class="list-group">
        @foreach($user->ads as $ad)
          <a href="{{ route('ads.show', $ad->id) }}" class="list-group-item">{{ $ad->title }}</a>
        @endforeach
      </div>
    @endunless
  </fieldset>

  <fieldset>
    <legend>Messages</legend>
    @unless($user->messages->isEmpty())
      <div class="list-group">
        @foreach($user->messages as $key => $message)
          <a class="list-group-item" href="#" data-toggle="modal" data-target="#message-{{ $key }}"><strong>{{ $message->name }}</strong></a>
          <div class="modal fade" id="message-{{ $key }}" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">{{ $message->name }}</h4>
                </div>
                <div class="modal-body">
                  <em>{{ $message->created_at->diffForHumans() }}</em>
                  {!! $message->message !!}
                  <p><strong>Phone: </strong>{{ $message->phone }}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endunless
  </fieldset>

@stop
