@extends('app')

@section('title', 'Ads')

@section('content')
  <h1>Ads</h1>
  @foreach($ads as $ad)
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="#" class="MakaleYazariAdi">{{ $ad->user->name }}</a>
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete</a></li>
              </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Canis_lupus.jpg/260px-Canis_lupus.jpg" alt="Kurt">
                    </a>
                </div>
                <div class="media-body">
                <h4 class="media-heading">Lorem ipsum</h4>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nulla sapien, semper in sodales ac, rutrum at orci. Maecenas vulputate nec tellus sit amet porttitor. Suspendisse congue porta sagittis. Ut erat diam, consectetur sed tempus id, sodales nec felis. Donec sagittis nunc sapien, non consequat nunc ultrices non. Aliquam accumsan ligula ante, non commodo risus sodales a. Vestibulum facilisis, enim in porta fringilla, tortor sapien congue purus, porta consectetur sem turpis vitae mauris. Donec dapibus justo a elit semper, et scelerisque mauris ullamcorper. Maecenas blandit arcu nec euismod pellentesque. Fusce et imperdiet nisi, at suscipit sem. Aliquam pulvinar risus id cursus elementum. Nulla elementum placerat nibh, in dictum enim mollis non. Morbi vehicula eget est et tristique. Aenean condimentum augue id congue convallis. Phasellus congue non tellus nec pretium. Maecenas eu vulputate lacus, eget feugiat odio.
                <div class="clearfix"></div>
                <div class="btn-group" role="group" id="BegeniButonlari">
                    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down"></span></button>
                </div>                 
               </div>
            </div>
        </div>
    </div>
  @endforeach
@stop
