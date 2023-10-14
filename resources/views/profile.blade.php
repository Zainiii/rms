@extends('snippet.header')

@section('title')Profile @stop

@section('content')

  @include('snippet.topnav')

  <div class="container col-md-10 bg-white mt-5 p-5">
    <h3>Profile & Settings</h3>

    @include('snippet.message')

    <div class="mt-5">

      <form class="row" action="{!! route('profile_update', ['type'=>'email']) !!}" method="POST">             
        @csrf
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
            </div>
            <div class="col-sm-2">
              <button type="submit" class="btn btn-primary">Update Email</button>
            </div>
          </div>
      </form>

      <form class="row mt-5" action="{!! route('profile_update', ['type'=>'password']) !!}" method="POST">             
        @csrf
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label text-right">New Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="col-sm-4">
              <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password">
            </div>
            <div class="col-sm-2">
              <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
          </div>
      </form>


    </div>
  
  </div>


@stop