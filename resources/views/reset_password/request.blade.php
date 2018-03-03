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
      <h2><span>パスワード再設定 案内メールの送信完了</span></h2>
      <p class="lead">ご入力いただいたメールアドレスにパスワード再設定手順の案内メールを送信しました。</p>
      <p class="lead2">・{{ config('linq.mail.address') }}から届くパスワード再設定手順の案内メールをご確認いただき、<br>
          <?php
          $expiresIn = config('linq.reset_password_request.expires_in');
          $expires = '';
          if ($expiresIn > 60) {
              $expires = floor($expiresIn / 60) . '時間';
              $expiresIn = $expiresIn % 60;
          }
          if ($expiresIn > 0) {
              $expires .= $expiresIn . '分';
          }
          echo $expires;
          ?>以内にパスワード変更を行ってください。</p>
      <p class="lead3">・メールが見つからない場合は、迷惑メールフォルダやフィルター設定をご確認ください。<br />
        また、「@<?php echo preg_replace("/.*@/i","",config('linq.mail.address')); ?>」ドメインからのメールを受け取れるように設定してください。</p>
      <ul><li><a href="{{ route('root.index') }}"><span>トップページへ</span></a></li></ul>
    </div>
  </div>
</section>

@endsection
