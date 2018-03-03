@extends('layout.master')

<?php

    $layout = [
        'title' => 'ログイン',
    ];

?>

@section('content')
<h1>ログイン</h1>
<div class="col-md-8">
  <form method="post" action="{{ route('auth.signin') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email">E-Mail</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="user@example.com">
      @if ($errors->has('email'))
      <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password">パスワード</label>
      <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="password">
      @if ($errors->has('password'))
      <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('remember') ? 'has-error' : '' }}">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember"> ログイン状態を保持する
        </label>
      </div>
    </div>

    <button type="submit" class="btn btn-default"><i class="fa fa-sign-in"></i> ログイン</button>
    <a href="{{ route('reset_password.request_form') }}">パスワードわすれた</a>
  </form>
</div>

@endsection
