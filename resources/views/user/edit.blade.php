@extends('staff.layout.master')

<?php

    $layout = [
        'left' => true,
        'user' => true,
        'title' => '基本情報',
    ];

?>

@section('content')

<section>
  <div class="reset_box">
    <div class="rs_inner">
      <h2><span>基本情報設定</span></h2>

      {{ Form::model($user, ['route' => 'staff.user.update', 'method' => 'put']) }}
      <div class="rs_inner2">
        <dl>
          <dt><span>必須</span>姓</dt>
          <dd>
            @if ($errors->has('last_name'))
            <p class="err_message"><span>{{ $errors->first('last_name') }}</span></p>
            @endif
            <input type="text" name="last_name" placeholder="姓" value="{{ Request::old('last_name') ?: $user->last_name }}"></dd>
        </dl>
        <dl>
          <dt><span>必須</span>名</dt>
          <dd>
            @if ($errors->has('first_name'))
            <p class="err_message"><span>{{ $errors->first('first_name') }}</span></p>
            @endif
            <input type="text" name="first_name" placeholder="名" value="{{ Request::old('first_name') ?: $user->first_name }}"></dd>
        </dl>
        <dl>
          <dt><span>必須</span>姓 フリガナ</dt>
          <dd>
            @if ($errors->has('last_name_kana'))
            <p class="err_message"><span>{{ $errors->first('last_name_kana') }}</span></p>
            @endif
            <input type="text" name="last_name_kana" placeholder="名" value="{{ Request::old('last_name_kana') ?: $user->last_name_kana }}"></dd>
        </dl>
        <dl>
          <dt><span>必須</span>名 フリガナ</dt>
          <dd>
            @if ($errors->has('first_name_kana'))
            <p class="err_message"><span>{{ $errors->first('first_name_kana') }}</span></p>
            @endif
            <input type="text" name="first_name_kana" placeholder="名" value="{{ Request::old('first_name_kana') ?: $user->first_name_kana }}"></dd>
        </dl>
        <dl>
          <dt><span>必須</span>郵便番号</dt>
          <dd>
            @if ($errors->has('zip'))
            <p class="err_message"><span>{{ $errors->first('zip') }}</span></p>
            @endif
            <input type="text" name="zip" placeholder="半角数字で入力" value="{{ Request::old('zip') ?: $user->zip }}"></dd>
        </dl>
        <dl>
          <dt><span>必須</span>都道府県名</dt>
          <dd>
            @if ($errors->has('prefecture'))
            <p class="err_message"><span>{{ $errors->first('prefecture') }}</span></p>
            @endif
            <input type="text" name="prefecture" placeholder="都道府県名" value="{{ Request::old('prefecture') ?: $user->prefecture }}"></dd>
        </dl>
        <dl>
          <dt><span>必須</span>市区町村、番地</dt>
          <dd>
            @if ($errors->has('address1'))
            <p class="err_message"><span>{{ $errors->first('address1') }}</span></p>
            @endif
            <input type="text" name="address1" placeholder="市区町村、番地" value="{{ Request::old('address1') ?: $user->address1 }}"></dd>
        </dl>
        <dl>
          <dt>ビル・マンション名</dt>
          <dd>
            @if ($errors->has('address2'))
            <p class="err_message"><span>{{ $errors->first('address2') }}</span></p>
            @endif
            <input type="text" name="address2" placeholder="ビル・マンション名" value="{{ Request::old('address2') ?: $user->address2 }}"></dd>
        </dl>
        <dl>
          <dt>電話番号</dt>
          <dd>
            @if ($errors->has('tel'))
            <p class="err_message"><span>{{ $errors->first('tel') }}</span></p>
            @endif
            <input type="text" name="tel" placeholder="半角数字で入力" value="{{ Request::old('tel') ?: $user->tel }}"></dd>
        </dl>

        <dl>
          <dt></dt>
          <dd><button type="submit" id="btn_reset"><span>変更する</span></button></dd>
        </dl>
      </div>
      {{ Form::close() }}

    </div>
  </div>
</section>

@endsection
