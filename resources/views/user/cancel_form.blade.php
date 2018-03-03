@extends('layout.master')

<?php

    $layout = [
        'title' => '退会',
    ];

?>

@section('content')

<section>
  <div class="withdrawal_box">


      {{ Form::model($user, ['route' => 'user.cancel', 'method' => 'delete']) }}
        <div class="wd_inner2">
          <dl>
            <dt><span>必須</span>退会理由</dt>
            <dd>
              @if ($errors->has('canceled_reason'))
              <p class="err_message"><span>{{ $errors->first('canceled_reason') }}</span></p>
              @endif
              <select name="canceled_reason" id="w1"@if ($errors->has('canceled_reason')) class="err"@endif>
                <option value="">お選びください</option>
@foreach (\App\User::getCanceledReasons() as $reason)
<option value="{{$reason}}"@if (Request::old('canceled_reason') === $reason) selected @endif>{{$reason}}</option>
@endforeach
              </select>
            </dd>
          </dl>
          <dl>
            <dt>その他の理由</dt>
            <dd>
              @if ($errors->has('canceled_other_reason'))
              <p class="err_message"><span>{{ $errors->first('canceled_other_reason') }}</span></p>
              @endif
              <textarea name="canceled_other_reason" placeholder="500文字以内で入力"@if ($errors->has('canceled_other_reason')) class="err"@endif>{{ Request::old('canceled_other_reason') }}</textarea>
            </dd>
          </dl>
          <dl>
            <dt><span>必須</span>パスワード</dt>
            <dd>
              @if ($errors->has('password'))
              <p class="err_message"><span>{{ $errors->first('password') }}</span></p>
              @endif
              <input type="password" name="password" id="w2" autocomplete="off" placeholder="半角英数字6～20文字で入力"@if ($errors->has('password')) class="err"@endif />
            </dd>
          </dl>
          <button type="submit" id="btn_withdrawal"><span>退会する</span></button>
        </div>
      {{ Form::close() }}

    </div>
  </div>
</section>

@endsection
