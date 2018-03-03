@extends('layout.master')

<?php

    $layout = [
        'left' => false,
        'right' => false,
        'footer' => true,
        'header_buttons' => false,
        'columns' => 1,
        'css' => 'password_remind',
        'title' => 'パスワード再設定',
        'js' => [],
    ];

?>

@section('content')

<section>
  <div class="remind_box">
    <div class="rm_inner">
      <h2><span>パスワード再設定</span></h2>
      <p class="caution">セキュリティ上の観点から、「パスワード」はお問い合わせをいただいてもお答えできません。<br />
        パスワードをお忘れの場合は、パスワードの再設定をお願いいたします。</p>
      <p class="lead">ご登録のメールアドレスを入力して「送信する」を押してください。<br />
        パスワード再設定手順の案内メールをお送りしますので、メールの指示に従ってパスワードを再設定してください。<br />
      </p>

      <form method="post" action="{{ route('staff.reset_password.request') }}"> <!--reset_password-->
        {{ csrf_field() }}
        <div class="rm_inner2">
          <dl>
            <dt><span>必須</span>メールアドレス</dt>
            <dd>
              @if ($errors->has('email'))
              <p class="err_message"><span>{{ $errors->first('email') }}</span></p>
              @endif
              <input type="mail" name="email" placeholder="半角英数字で入力" value="{{ old('email') }}"@if ($errors->has('email')) class="err"@endif></dd>
          </dl>
          <dl>
            <dt></dt>
            <dd><button type="submit"><span>送信する</span></button>
          </dl>
        </div>
      </form>

    </div>
  </div>
</section>

@endsection
