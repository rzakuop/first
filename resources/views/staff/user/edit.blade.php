@extends('staff.layout.master')

<?php

    $layout = [
        'left' => true,
        'user' => true,
        'title' => '基本情報',
    ];

?>

@section('content')

<h2><span>基本情報設定</span></h2>

<div class="col-md-8">

  {{ Form::model($user, ['route' => 'staff.user.update', 'method' => 'put', 'files' => true, 'class' => 'form-horizontal']) }}

    <div class="form-group">
      <label for="" class="control-label col-md-4">姓 <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <input type="text" name="last_name" placeholder="姓" value="{{ Request::old('last_name') ?: $user->last_name }}" class="{{ $errors->has('last_name') ? ' err' : '' }}" />
        @if ($errors->has('last_name'))
        <p class="err_message"><span>{{ $errors->first('last_name') }}</span></p>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label for="" class="control-label col-md-4">名 <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <input type="text" name="first_name" placeholder="名" value="{{ Request::old('first_name') ?: $user->first_name }}" class="{{ $errors->has('first_name') ? ' err' : '' }}" />
        @if ($errors->has('first_name'))
        <p class="err_message"><span>{{ $errors->first('first_name') }}</span></p>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label for="" class="control-label col-md-4">画像 <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <input type="file" name="image" class="form-control">
        @if ($errors->has('image'))
        <p class="err_message"><span>{{ $errors->first('image') }}</span></p>
        @endif
        @if ($user->image)
        <div class="col-md-8">
          <div class="thumbnail">
            <img src="{{ asset($user->imageUrl()) }}" alt="" class="img-thumbnail small">
          </div>
        </div>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-4">エリア <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <?php $areaOld = Request::old('area') ?: $user->area;?>
        <select  name="area" class="form-control{{ $errors->has('prefecture') ? ' err' : '' }}">
          <option value="">選択してください</option>
          @foreach(App\Staff::getAreas() as $area)
            <option value="{{ $area }}"@if($areaOld == $area) selected="selected"@endif>{{ $area }}</option>
          @endforeach
        </select>
        @if ($errors->has('area'))
        <p class="err_message"><span>{{ $errors->first('area') }}</span></p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="" class="control-label col-md-4">プロフィール <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <textarea name="description" placeholder="プロフィール" class="form-control{{ $errors->has('description') ? ' err' : '' }}">{{ Request::old('description') ?: $user->description }}</textarea>
        @if ($errors->has('description'))
        <p class="err_message"><span>{{ $errors->first('description') }}</span></p>
        @endif
        </div>
    </div>


    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <button type="submit" id="btn_reset" class="btn btn-default">変更する</button>
        <a href="{{ route('staff.user.show') }}" class="btn btn-secondary">戻る</a>
      </div>
    </div>
  </div>
  {{ Form::close() }}

</div>

@endsection
