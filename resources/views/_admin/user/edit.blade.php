@extends('_admin.layout.master')
@section('title','ユーザー 編集')

@section('content')

<div class="col-md-8">

{{ Form::model($user, ['route' => ['users.update', $user->id . '?' . http_build_query($_GET)] , 'method' => 'put', 'class' => 'form-horizontal']) }}

    @include('_admin.user._form', ['user' => $user])
    <input type="hidden" name="id" value="{{ $user->id }}">
    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">戻る</a>
        <button type="submit" class="btn btn-primary"><span>更新</span></button>
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
