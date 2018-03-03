@extends('staff.layout.master')

<?php

    $layout = [
        'title' => 'パスワード再設定',
    ];

?>

@section('content')

<h3><span>パスワード再設定</span></h3>
<div class="col-md-8">
  {!! Form::model($user, ['route' => 'staff.user.update_password', 'method' => 'put']) !!}
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password">現在のパスワード</label>
      <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"" placeholder="半角英数字で入力">
      @if ($errors->has('password'))
        <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
      @endif
    </div>


    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
      <label for="new_password">新しいパスワード</label>
      <input type="password" name="new_password" id="new_password" value="{{ old('new_password') }}" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}"" placeholder="半角英数字で入力">
      @if ($errors->has('new_password'))
        <span class="text-danger"><strong>{{ $errors->first('new_password') }}</strong></span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
      <label for="new_password_confirmation">新しいパスワード（確認用）</label>
      <input type="password" name="new_password_confirmation" id="new_password_confirmation" value="{{ old('new_password_confirmation') }}" class="form-control {{ $errors->has('new_password_confirmation') ? 'is-invalid' : '' }}"" placeholder="半角英数字で入力">
      @if ($errors->has('new_password_confirmation'))
        <span class="text-danger"><strong>{{ $errors->first('new_password_confirmation') }}</strong></span>
      @endif
    </div>

    <button type="submit" class="btn btn-default"><i class="fa fa-sign-in"></i> 変更する</button>
  {!! Form::close() !!}
</div>

@endsection
