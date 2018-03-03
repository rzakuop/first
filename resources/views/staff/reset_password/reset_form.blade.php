@extends('layout.master')

<?php

    $layout = [
        'left' => false,
        'right' => false,
        'footer' => true,
        'header_buttons' => false,
        'columns' => 1,
        'css' => 'password_reset',
        'title' => 'パスワード再設定',
        'js' => ['password_reset'],
    ];

?>

@section('content')

<section>
  <div class="reset_box">
    <div class="rs_inner">
      <h2><span>パスワード再設定</span></h2>
      <p class="lead">新しいパスワードを入力してください。</p>

      <form method="post" action="{{ route('staff.reset_password.reset') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="token" value="{{ request()->token }}">
        <div class="rs_inner2">
          <dl>
            <dt><span>必須</span>新しいパスワード</dt>
            <dd>
              @if ($errors->has('password'))
              <p class="err_message"><span>{{ $errors->first('password') }}</span></p>
              @endif
              <input type="password" name="password" placeholder="半角英数字6～20文字で入力"@if ($errors->has('password')) class="err"@endif></dd>
          </dl>
          <dl>
            <dt><span>必須</span>新しいパスワード（確認用）</dt>
            <dd>
              @if ($errors->has('password_confirmation'))
              <p class="err_message"><span>{{ $errors->first('password_confirmation') }}</span></p>
              @endif
              <input type="password" name="password_confirmation" placeholder="半角英数字6～20文字で入力"></dd>
          </dl>
          <dl>
            <dt></dt>
            <dd><button type="submit" id="btn_reset"><span>変更する</span></button></dd>
          </dl>
        </div>
      </form>

    </div>
  </div>
</section>

@endsection
