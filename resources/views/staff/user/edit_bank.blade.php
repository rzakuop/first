@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '口座設定',
    ];

?>

@section('content')

<h3 class=""><span>口座設定</span></h3>

<div class="col-md-8">

  {!! Form::model($user, ['route' => ['staff.user.update_bank', $user->id] , 'method' => 'put', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
      <label for="label" class="control-label col-md-4">銀行名<br /></label>
      <div class="col-md-8">
          <input type="text" class="form-control  {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" name="bank_name" placeholder="" value="{{ Request::old('bank_name') ?: $user->bank_name }}" />
          @if ($errors->has('bank_name'))
            <div class="invalid-feedback"><span>{{ $errors->first('bank_name') }}</span></div>
          @endif
      </div>
    </div>
    <!-- / .form-group -->


    <div class="form-group">
      <label for="label" class="control-label col-md-4">支店名<br /></label>
      <div class="col-md-8">
          <input type="text" class="form-control  {{ $errors->has('bank_branch_name') ? 'is-invalid' : '' }}" name="bank_branch_name" placeholder="" value="{{ Request::old('bank_branch_name') ?: $user->bank_branch_name }}" />
          @if ($errors->has('bank_branch_name'))
            <div class="invalid-feedback"><span>{{ $errors->first('bank_branch_name') }}</span></div>
          @endif
      </div>
    </div>
    <!-- / .form-group -->

    <div class="form-group">
      <label for="label" class="control-label col-md-4">口座番号<br /></label>
      <div class="col-md-8">
          <input type="text" class="form-control  {{ $errors->has('bank_account_number') ? 'is-invalid' : '' }}" name="bank_account_number" placeholder="" value="{{ Request::old('bank_account_number') ?: $user->bank_account_number }}" />
          @if ($errors->has('bank_account_number'))
            <div class="invalid-feedback"><span>{{ $errors->first('bank_account_number') }}</span></div>
          @endif
      </div>
    </div>
    <!-- / .form-group -->


    <div class="form-group">
      <label for="label" class="control-label col-md-4">口座名義 姓<br /></label>
      <div class="col-md-8">
          <input type="text" class="form-control  {{ $errors->has('bank_account_last_name') ? 'is-invalid' : '' }}" name="bank_account_last_name" placeholder="" value="{{ Request::old('bank_account_last_name') ?: $user->bank_account_last_name }}" />
          @if ($errors->has('bank_account_last_name'))
            <div class="invalid-feedback"><span>{{ $errors->first('bank_account_last_name') }}</span></div>
          @endif
      </div>
    </div>
    <!-- / .form-group -->


    <div class="form-group">
      <label for="label" class="control-label col-md-4">口座名義 名<br /></label>
      <div class="col-md-8">
          <input type="text" class="form-control  {{ $errors->has('bank_account_first_name') ? 'is-invalid' : '' }}" name="bank_account_first_name" placeholder="" value="{{ Request::old('bank_account_first_name') ?: $user->bank_account_first_name }}" />
          @if ($errors->has('bank_account_first_name'))
            <div class="invalid-feedback"><span>{{ $errors->first('bank_account_first_name') }}</span></div>
          @endif
      </div>
    </div>
    <!-- / .form-group -->


    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <button type="submit" class="btn btn-default">変更する</button>
        <a href="{{ route('staff.user.show') }}" class="btn btn-secondary">戻る</a>
      </div>
    </div>
    <!-- / .form-group -->

  {!! Form::close() !!}

</div>
@endsection
