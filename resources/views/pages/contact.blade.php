@extends('app')

@section('title', 'Contact')

@section('body-class', 'contact')

@section('content')

  <h1>Contact</h1>
  <form action="{{ route('contact.store') }}" method="post">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" name="subject" id="subject" class="form-control">
    </div>
    <div class="form-group">
      <label for="message">Message</label>
      <textarea name="message" id="message" class="ckeditor"></textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Send" class="btn btn-block btn-warning">
    </div>
  </form>
@stop
