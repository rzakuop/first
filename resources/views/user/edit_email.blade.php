@extends('staff.layout.master')

<?php

    $layout = [
        'title' => 'メールアドレス変更',
    ];

?>

@section('content')

<h3><span>メールアドレス変更</span></h3>

<div class="col-md-8">
  {!! Form::model($user, ['route' => 'staff.user.request_email', 'method' => 'put']) !!}
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('new_email') ? ' has-error' : '' }}">
      <label for="new_email">新しいメールアドレス</label>
      <input type="new_email" name="new_email" id="new_email" value="{{ old('new_email') }}" class="form-control {{ $errors->has('new_email') ? 'is-invalid' : '' }}"" placeholder="半角英数字で入力">
      @if ($errors->has('new_email'))
        <span class="text-danger"><strong>{{ $errors->first('new_email') }}</strong></span>
      @endif
    </div>

    <button type="submit" class="btn btn-default"><i class="fa fa-sign-in"></i> 変更する</button>

  {!! Form::close() !!}
</div>

@endsection
