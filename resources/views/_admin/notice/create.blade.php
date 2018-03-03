@extends('_admin.layout.master')
@section('title','お知らせ 新規登録')

@section('content')

<div class="col-md-8">
  {{ Form::open(['route' => 'notices.store', 'method' => 'post', 'class' => 'form-horizontal']) }}
    @include('_admin.notice._form', ['notice' => $notice])
    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <a href="{{ route('notices.index') }}" class="btn btn-secondary">戻る</a>
        <button type="submit" class="btn btn-primary"><span>保存する</span></button>
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
