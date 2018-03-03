@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '退会',
    ];

?>

@section('content')

<h1>退会する</h1>

<div class="col-md-8">
  {{ Form::model($user, ['route' => 'staff.user.cancel', 'method' => 'delete', 'class' => 'form-horizontal']) }}

      <div class="form-group">
        <label for="" class="control-label col-md-4">退会理由 <span>※</span></label>
        <div class="col-md-8">
          <select name="canceled_reason" id="w1" class="form-control{{ ($errors->has('canceled_reason')) ? " err" : "" }}">
            <option value="">お選びください</option>
@foreach (\App\User::getCanceledReasons() as $reason)
<option value="{{$reason}}"@if (Request::old('canceled_reason') === $reason) selected @endif>{{$reason}}</option>
@endforeach
          </select>
          @if ($errors->has('canceled_reason'))
          <p class="err_message"><span>{{ $errors->first('canceled_reason') }}</span></p>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="" class="control-label col-md-4">その他の理由</label>
        <div class="col-md-8">
          <textarea name="canceled_other_reason" placeholder="500文字以内で入力" class="form-control{{ ($errors->has('canceled_other_reason')) ? " err" : "" }}">{{ Request::old('canceled_other_reason') }}</textarea>
          @if ($errors->has('canceled_other_reason'))
          <p class="err_message"><span>{{ $errors->first('canceled_other_reason') }}</span></p>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="" class="control-label col-md-4">パスワード <span>※</span></label>
        <div class="col-md-8">
          <input type="password" name="password" id="w2" autocomplete="off" placeholder="半角英数字6～20文字で入力" class="form-control{{ ($errors->has('password')) " err" : "" }}" />
          @if ($errors->has('password'))
          <p class="err_message"><span>{{ $errors->first('password') }}</span></p>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-offset-4 col-md-8">
          <button type="submit" id="btn_withdrawal" class="btn btn-danger" disabled><span>退会する</span></button>
        </div>
      </div>

  {{ Form::close() }}

</div>

@endsection
