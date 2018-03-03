@extends('_admin.layout.master')
@section('title','ログイン')

@section('content')
<div class="col-md-8">
  {{ Form::open(['route' => '_admin.auth.signin', 'method' => 'post', 'class' => 'form-horizontal']) }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email" class="control-label col-md-3">E-Mail</label>
      <div class="col-md-9">
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="admin@example.com">
        @if ($errors->has('email'))
        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password" class="control-label col-md-3">パスワード</label>
      <div class="col-md-9">
        <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="password">
        @if ($errors->has('password'))
        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('remember') ? 'has-error' : '' }}">
      <div class=" col-md-offset-3 col-md-9">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> ログイン状態を保持する
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-3 col-md-9">
        <button type="submit" class="btn btn-default"><i class="fa fa-sign-in"></i> ログイン</button>
      </div>
    </div>

  {{ Form::open() }}
</div>

@endsection
