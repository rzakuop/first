@extends('layout.master')

<?php

    $layout = [
        'title' => 'お問い合わせ'
    ];

?>

@section('content')
<h1>お問い合わせ</h1>

{!! Form::open( ['route' => 'contact.store', 'method' => 'post', 'files' => true]) !!}
  <div class="form-group">
    <label for="exampleInputPassword1">お名前</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="お名前">
    @if ($errors->has('name'))
       <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
    @endif
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">メールアドレス</label>
    <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="メールアドレス">
    @if ($errors->has('email'))
       <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
    @endif
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">お問い合わせ内容</label>
    <textarea name="body" rows="6" class="form-control">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
       <span class="help-block"><strong>{{ $errors->first('body') }}</strong></span>
    @endif
  </div>

  <div class="form-group">
    <button type="button" class="btn btn-default">送信する</button>
  </div>
{!! Form::close() !!}




@endsection
